<?php

namespace App\DesignPatterns\TemplateMethod;

abstract class Command
{
    public const SUCCESS = 0;
    public const FAILURE = 1;

    public function run(array $input): int
    {
        $args = array_slice($input, 2);

        return $this->doRun($args) ? self::SUCCESS : self::FAILURE;
    }

    abstract public function doRun(array $args): bool;
}
