<?php

namespace App\DesignPatterns\Decorator;

class DecoratorItalic extends Decorator
{
    public function write(string $what): string
    {
        return sprintf("<i>%s</i>", $this->inner->write($what));
    }
}
