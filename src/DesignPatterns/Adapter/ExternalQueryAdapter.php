<?php

namespace App\DesignPatterns\Adapter;

use App\DesignPatterns\Proxy\QueryInterface;

class ExternalQueryAdapter implements QueryInterface
{
    public function __construct(protected ExternalQuery $query) {}

    public function select(string $select): mixed
    {
        return $this->query->fetch($select);
    }

    public function insert(string $insert): bool
    {
        return $this->query->push($insert);
    }
}
