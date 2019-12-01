<?php
$config = include './config.php';

return [
    "paths" => [
        "migrations" => "db/migrations",
        "seeds" => "db/seeds"
    ],
    "environments" => [
        "default_migration_table" => "phinxlog",
        "default_database" => "dev",
        "dev" => [
            "adapter" => "mysql",
            "host" => $config['host'],
            "name" => $config['name'],
            "user" => $config['user'],
            "pass" => $config['pass'],
            "table_prefix" => $config['table_prefix'],
            "charset" => "utf8",
        ]
    ]
];

