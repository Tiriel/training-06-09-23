<?php

namespace App\DesignPatterns;

use App\DesignPatterns\Proxy\QueryInterface;

class Controller
{
    public function __construct(
        protected QueryInterface $query
    ) {}

    public function display()
    {
        $this->query->select('SELECT * FROM table_foo;');
    }
}
