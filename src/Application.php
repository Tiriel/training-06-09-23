<?php

namespace App;

use Psr\Container\ContainerInterface;

class Application
{
    private ContainerInterface $container;

    public function __construct()
    {
        $this->container = Container::create();
    }

    public function run(): string
    {
        // récupérer et vérifier infos de la requête
        $path = parse_url($_SERVER['REQUEST_URI'])['path'];

        // routing
        $router = $this->container->get(Router::class);
        [$controller, $action, $arguments] = $router->route($path);

        $controller = $this->container->get($controller);

        // Exécuter controller
        return $controller->$action(...$arguments);
    }
}
