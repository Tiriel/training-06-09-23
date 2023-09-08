<?php

namespace App\Config;

use App\Controller\PostController;
use App\Model\Db\Connection;
use App\Model\Db\Query;
use App\Router;
use Psr\Container\ContainerInterface;

class Services implements ContainerInterface
{
    private array $definitions = [
        Routes::class => [],
        Router::class => [Routes::class],
        Query::class => [Connection::class],
        Connection::class => [\PDO::class],
        PostController::class => [],
    ];

    public static function create(): self
    {
        return new self();
    }

    public function get(string $id)
    {
        if (!$this->has($id)) {
            throw new \InvalidArgumentException(sprintf("The service %s is not defined.", $id));
        }

        return $this->definitions[$id];
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->definitions);
    }
}
