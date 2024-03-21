<?php

use DI\Container;
// use UMA\DIC\Container;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/../vendor/autoload.php';

// Criação do container atraves bo bootstrap 
$container = require_once __DIR__ . '/../bootstrap.php';

AppFactory::setContainer($container);

$app = AppFactory::create();

// Configuração das rotas
$routes = require __dir__ . '/../config/routes.php';
$routes($app);

$app->run();
