<?php

use DI\Container;
// use UMA\DIC\Container;
use App\Domain\Repository\UserRepositoryInterface;
use App\Infrastructure\Persistrence\UserRepository;
use Doctrine\ORM\EntityManager;

return function(Container $container)
{
    $container->set(UserRepositoryInterface::class, function(Container $c) {
        return new UserRepository($c->get(EntityManager::class));
    });

    // $container->set(UserRepository::class, static function (Container $c) {
    //     return new UserRepository($c->get(EntityManager::class));
    // });
};