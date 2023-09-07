<?php

namespace App\DesignPatterns\Decorator;

class Pen implements WritingInterface
{

    public function write(string $what): string
    {
        return $what;
    }
}
