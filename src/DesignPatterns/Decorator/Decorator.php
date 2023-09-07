<?php

namespace App\DesignPatterns\Decorator;

abstract class Decorator implements WritingInterface
{
    public function __construct(
        protected WritingInterface $inner,
    ) {}
}
