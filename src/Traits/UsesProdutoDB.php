<?php

namespace Bildvitta\IssProduto\Traits;

trait UsesProdutoDB
{
    public function __construct(array $attributes = [])
    {
        $this->configDbConnection();
        parent::__construct($attributes);
    }

    public static function __callStatic($method, $parameters)
    {
        self::configDbConnection();

        return parent::__callStatic($method, $parameters);
    }

    protected static function configDbConnection(): void
    {
        config([
            'database.connections.iss-produto' => [
                'driver' => 'mysql',
                'url' => config('iss-produto.db.url'),
                'host' => config('iss-produto.db.host'),
                'port' => config('iss-produto.db.port'),
                'database' => config('iss-produto.db.database'),
                'username' => config('iss-produto.db.username'),
                'password' => config('iss-produto.db.password'),
                'unix_socket' => env('DB_SOCKET', ''),
                'charset' => 'utf8mb4',
                'collation' => 'utf8mb4_unicode_ci',
                'prefix' => '',
                'prefix_indexes' => true,
                'strict' => true,
                'engine' => null,
                'options' => [],
            ],
        ]);
    }
}
