<?php

namespace App\DesignPatterns\Decorator;

class DecoratorBold extends Decorator
{
    public function write(string $what): string
    {
        return sprintf("<b>%s</b>", $this->inner->write($what));
    }
}
