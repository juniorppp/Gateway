<?php

return [
    'settings' => [
        'displayErrorDetails' => true,
        'db' => [
            'host'     => '68.183.96.109',
            'user'     => 'gateway',
            'password' => 'Gateway#88580736',
            'dbname'   => 'gateway',
        ],
        'logger'   => [
            'name'     => 'dev',
            'filename' => __DIR__  . '/../../logs/app-dev.log',
            'level'    => \Monolog\Logger::DEBUG
        ],
        'view' => [
            'cache' => false,
            'debug' => true,
            'path'  => __DIR__ . '/../templates',
        ],
    ]
];
