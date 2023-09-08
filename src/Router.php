<?php

namespace App;

use App\Config\Routes;

class Router
{
    public function __construct(private Routes $routes) {}

    public function route(string $path): iterable
    {
        foreach ($this->routes->get() as $route => $definition) {
            if (preg_match('/\{(\w+)\}/', $route, $matches)) {
                $route = str_replace(sprintf("{%s}", $matches[1]), $definition['arguments'][$matches[1]], $route);
            }

            if (preg_match("#$route#", $path, $args)) {
                $arguments = [];
                if (isset($args[1])) {
                    $arguments[] = $args[1];
                }

                return [$definition['controller'], $definition['action'], $arguments];
            }
        }

        throw new \Exception(sprintf("There is no route defined for path %s", $path), 404);
    }
}
