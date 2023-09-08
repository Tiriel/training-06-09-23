<?php

namespace App\Config;

use App\Controller\PostController;

class Routes
{
    private array $definitions = [
        '/' => [
            'controller' => PostController::class,
            'action' => 'index',
            'arguments' => [],
        ],
        '/{slug}' => [
            'controller' => PostController::class,
            'action' => 'get',
            'arguments' => ['slug' => '[a-z0-9-]+'],
        ],
    ];

    public function get()
    {
        return $this->definitions;
    }
}
