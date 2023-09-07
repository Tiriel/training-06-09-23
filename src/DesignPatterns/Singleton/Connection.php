<?php

namespace App\DesignPatterns\Singleton;

class Connection
{
    protected static ?self $instance;

    protected \PDO $connection;

    private function __construct(string $dsn)
    {
        $this->connection = new \PDO($dsn);
    }

    private function __clone() {}

    public static function getInstance(string $dsn = ''): static
    {
        return static::$instance ?? static::$instance = new self($dsn);
    }

    public function getConnection(): \PDO
    {
        return $this->connection;
    }
}
