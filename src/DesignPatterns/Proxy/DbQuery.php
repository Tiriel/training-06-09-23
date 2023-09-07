<?php

namespace App\DesignPatterns\Proxy;

use App\DesignPatterns\Singleton\Connection;

class DbQuery implements QueryInterface
{
    public function __construct(protected Connection $connection)
    {
    }

    public function select(string $select): mixed
    {
        return $this->connection->getConnection()->query($select)->fetch();
    }

    public function insert(string $insert): bool
    {
        return $this->connection->getConnection()->query($insert)->execute();
    }
}
