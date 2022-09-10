<?php
return [
    'database' => [
        'db_host' => env('RADIUS_DB_HOST', 'localhost'),
        'db_name' => env('RADIUS_DB_NAME', 'radius'),
        'db_user' => env('RADIUS_DB_USER', 'radius'),
        'db_pass' => env('RADIUS_DB_PASS', null)
    ]
];
