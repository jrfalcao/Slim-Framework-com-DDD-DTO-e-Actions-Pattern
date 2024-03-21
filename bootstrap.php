<?php

use Doctrine\Common\Cache\Psr6\DoctrineProvider;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use DI\Container;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;

require_once __DIR__ . '/vendor/autoload.php';

$container = new Container(require __DIR__ . '/settings.php');

// $container->set(EntityManager::class, static function (Container $c): EntityManager {
//     /** @var array $settings */
//     $settings = $c->get('settings');

//     // Use the ArrayAdapter or the FilesystemAdapter depending on the value of the 'dev_mode' setting
//     // You can substitute the FilesystemAdapter for any other cache you prefer from the symfony/cache library
//     $cache = $settings['doctrine']['dev_mode'] ?
//         DoctrineProvider::wrap(new ArrayAdapter()) :
//         DoctrineProvider::wrap(new FilesystemAdapter(directory: $settings['doctrine']['cache_dir']));

//     $config = ORMSetup::createAttributeMetadataConfiguration(
//         $settings['doctrine']['metadata_dirs'],
//         $settings['doctrine']['dev_mode']
//     );

//     $connection = DriverManager::getConnection($settings['doctrine']['connection'], $config);

//     return new EntityManager($connection, $config);
// });

$doctrine = require __DIR__ . '/config/doctrine.php';
$doctrine($container);

// Configuração das dependências
$dependencies = require __DIR__ . '/config/dependencies.php';
$dependencies($container);

return $container;