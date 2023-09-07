<?php

namespace App\DesignPatterns\Proxy;

class NullQuery implements QueryInterface
{
    public array $data = [];

    public function select(string $select): mixed
    {
        return $this->data[$select];
    }

    public function insert(string $insert): bool
    {
        return $this->data[$insert];
    }
}
