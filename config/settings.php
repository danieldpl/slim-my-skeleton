<?php

// Database Settings
return [
    'slim'  => [
        // Fill in if you are going to run the application in a subdirectory. (Ex: '/slim')
        'basePath'      => ''
    ],
    'twig'  => [
        'twigViewPath'  => __DIR__.'/../views',
        'twigOptions'   => [
            'cache'     => false
        ]

    ],
    'db'    => [
        'driver'        => 'mysql',
        'host'          => 'localhost',
        'database'      => '',
        'username'      => '',
        'password'      => '',
        'charset'       => 'utf8mb4',
        'collation'     => 'utf8mb4_unicode_ci',
        'prefix'        => '',
        'options'       => [
            // Turn off persistent connections
            PDO::ATTR_PERSISTENT => false,
            // Enable exceptions
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            // Emulate prepared statements
            PDO::ATTR_EMULATE_PREPARES => true,
            // Set default fetch mode to array
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            // Set character set
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
        ]
    ]
    
];
