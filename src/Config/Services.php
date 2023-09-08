<?php

namespace App\Config;

use App\Controller\ContactController;
use App\Controller\PostController;
use App\Model\Db\Connection;
use App\Model\Db\Query;
use App\Router;
use App\View\Renderer;
use Psr\Container\ContainerInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Services implements ContainerInterface
{
    private array $definitions = [
        Routes::class => [],
        Router::class => [Routes::class],
        Query::class => [Connection::class],
        Connection::class => [\PDO::class],
        \PDO::class => ['sqlite:'.__DIR__.'/../../db.sqlite'],
        Renderer::class => [Environment::class],
        Environment::class => [FilesystemLoader::class],
        FilesystemLoader::class => [__DIR__.'/../../templates'],
        PostController::class => [Renderer::class, Query::class],
        ContactController::class => [Renderer::class, Query::class],
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
