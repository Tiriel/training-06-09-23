<?php

namespace App;

use App\Config\Services;
use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    protected static self $instance;

    protected array $services = [];
    protected Services $config;

    private function __construct()
    {
        $this->config = Services::create();
    }

    public static function create(): self
    {
        return self::$instance ?? self::$instance = new self();
    }

    public function get(string $id)
    {
        if (!$this->has($id)) {
            $arguments = $this->config->get($id);
            foreach ($arguments as $key => $argument) {
                if ($this->config->has($argument)) {
                    $arguments[$key] = $this->get($argument);
                }
            }
            $this->services[$id] = new $id(...$arguments);
        }

        return $this->services[$id];
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->services);
    }
}
