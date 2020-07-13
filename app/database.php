<?php

use Illuminate\Database\Capsule\Manager;

$config = $container->get('settings')['connection'];
$capsule = new Manager();

$capsule->addConnection(
    [
        'driver' => 'mysql',
        'host' => $config['host'],
        'port' => $config['port'],
        'database' => $config['dbname'],
        'username' => $config['dbuser'],
        'password' => $config['dbpass'],
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
    ]
);

$capsule->setAsGlobal();
$capsule->bootEloquent();
$container->set('eloquent', $capsule);
