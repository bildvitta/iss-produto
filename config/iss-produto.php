<?php

return [

    'base_uri' => env('MS_PRODUTO_BASE_URI', 'https://api-dev-produto.nave.dev'),

    'front_uri' => env('MS_PRODUTO_FRONT_URI', 'https://develop.produto.nave.dev'),

    'prefix' => env('MS_PRODUTO_API_PREFIX', '/api'),

    'db' => [
        'url' => env('MS_PRODUTO_DB_URL'),
        'host' => env('MS_PRODUTO_DB_HOST'),
        'port' => env('MS_PRODUTO_DB_PORT'),
        'database' => env('MS_PRODUTO_DB_DATABASE'),
        'username' => env('MS_PRODUTO_DB_USERNAME'),
        'password' => env('MS_PRODUTO_DB_PASSWORD'),
    ],
];
