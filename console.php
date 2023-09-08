<?php

use App\App;
use App\DesignPatterns\TemplateMethod\AddCommand;
use App\DesignPatterns\TemplateMethod\HelloCommand;

require_once 'vendor/autoload.php';

$commandName = $argv[1];

$classname = match ($commandName) {
    'hello' => HelloCommand::class,
    'add' => AddCommand::class,
    default => null
};

$app = (new App())->boot();
$command = $app->getContainer()->get($classname);

exit($command->run($argv));
