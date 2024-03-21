<?php

use Doctrine\Common\Cache\Psr6\DoctrineProvider;
use Doctrine\ORM\EntityManager;
// use Doctrine\ORM\Tools\Setup;
// use Psr\Container\ContainerInterface;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
// use UMA\DIC\Container;
use DI\Container;
use Doctrine\ORM\ORMSetup;
use Doctrine\DBAL\DriverManager;

return function (Container $container) 
{
    $container->set(EntityManager::class, static function ( $container ): EntityManager {
        /** @var array $settings */
        $settings = $container->get('settings');

        // Use the ArrayAdapter or the FilesystemAdapter depending on the value of the 'dev_mode' setting
        // You can substitute the FilesystemAdapter for any other cache you prefer from the symfony/cache library
        $cache = $settings['doctrine']['dev_mode'] ?
            DoctrineProvider::wrap(new ArrayAdapter()) :
            DoctrineProvider::wrap(new FilesystemAdapter(directory: $settings['doctrine']['cache_dir']));

        $config = ORMSetup::createAttributeMetadataConfiguration(
            $settings['doctrine']['metadata_dirs'],
            $settings['doctrine']['dev_mode']
        );

        $connection = DriverManager::getConnection($settings['doctrine']['connection'], $config);

        return new EntityManager($connection, $config);
    });

};
