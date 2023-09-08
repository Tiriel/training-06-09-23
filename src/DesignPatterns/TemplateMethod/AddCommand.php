<?php

namespace App\DesignPatterns\TemplateMethod;

class AddCommand extends Command
{

    public function doRun(array $args): bool
    {
        if (\count($args) < 2) {
            throw new \InvalidArgumentException();
        }

        $sum = 0;
        foreach ($args as $arg) {
            $sum += $arg;
        }

        echo sprintf("%d\n", $sum);

        return true;
    }
}
