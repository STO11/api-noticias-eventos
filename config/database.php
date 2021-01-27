<?php 
return [
    'default' => env('DB_CONNECTION', 'sqlite'),
    'connections' => [
        'sqlite' => [
            'driver' => 'sqlite',
            'host' => env('DB_HOST', '127.0.0.1'),
            'database' => env('DB_DATABASE', database_path('database.sqlite'))
        ],
    ],
    'fetch' => PDO::FETCH_CLASS, // Returns DB objects in an array format.
    'migrations' => 'migrations'
];