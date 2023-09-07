<?php

namespace App\DesignPatterns\Adapter;

class ExternalQuery
{
    public function fetch($fetchQuery): mixed
    {
        return true;
    }

    public function push(string $pushQuery): bool
    {
        return true;
    }
}
