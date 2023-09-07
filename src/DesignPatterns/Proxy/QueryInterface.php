<?php

namespace App\DesignPatterns\Proxy;

interface QueryInterface
{
    public function select(string $select): mixed;

    public function insert(string $insert): bool;
}
