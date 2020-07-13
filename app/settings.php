<?php

use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        'settings' => [
            'connection' => [
                'host' => getenv('DB_HOST'),
                'port' => getenv('DB_PORT'),
                'dbname' => getenv('DB_NAME'),
                'dbuser' => getenv('DB_USERNAME'),
                'dbpass' => getenv('DB_PASSWORD'),
            ]
        ],
    ]);
};
