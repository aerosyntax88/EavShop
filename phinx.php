<?php

return [
    'paths' => [
        'migrations' => 'migrations',
        'seeds' => 'seeds'
    ],
    'migration_base_class' => 'App\migrations\Migration',
    'environments' => [
        'default_migration_table' => 'migrations',
        'default_database' => 'shop',
        'shop' => [
            'adapter' => 'mysql',
            'host' => 'shop_db_1',
            'port' => '3306',
            'name' => 'shop',
            'user' => 'user',
            'pass' => 'secret',
        ]
    ]
];