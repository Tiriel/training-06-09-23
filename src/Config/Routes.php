<?php

namespace App\Config;

use App\Controller\ContactController;
use App\Controller\PostController;

class Routes
{
    private array $definitions = [
        '/' => [
            'controller' => PostController::class,
            'action' => 'index',
            'arguments' => [],
        ],
        '/contact' => [
            'controller' => ContactController::class,
            'action' => 'contact',
            'arguments' => [],
        ],
        '/post/{slug}' => [
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
