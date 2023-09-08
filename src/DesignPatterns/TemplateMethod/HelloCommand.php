<?php

namespace App\DesignPatterns\TemplateMethod;

class HelloCommand extends Command
{
    public function doRun(array $args): bool
    {
        $name = $args[0];

        echo sprintf("Hello %s\n", $name);

        return true;
    }
}
