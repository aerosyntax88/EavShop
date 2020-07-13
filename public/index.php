<?php

use DI\ContainerBuilder;
use Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
Dotenv::createImmutable('../')->load();
$settings = require __DIR__ . '/../app/settings.php';
$settings($containerBuilder);

$serviceProvider = require __DIR__ . '/../app/serviceProvider.php';
$serviceProvider($containerBuilder);
$container = $containerBuilder->build();

$db = require __DIR__ . '/../app/database.php';
$routes = require __DIR__ . '/../app/routes.php';