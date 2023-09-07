<?php

namespace App\DesignPatterns\Proxy;

class ProxyDbQuery implements QueryInterface
{
    protected array $cache = [];
    public function __construct(protected DbQuery $query)
    {
    }

    public function select(string $select): mixed
    {
        return $this->checkCache($select)
            ?? $this->cache[$select] = $this->query->select($select);
    }

    public function insert(string $insert): bool
    {
        return $this->checkCache($insert)
            ?? $this->cache[$insert] = $this->query->insert($insert);
    }

    private function checkCache(string $query): mixed
    {
        if (\array_key_exists($query, $this->cache)) {
            return $this->cache[$query];
        }

        return null;
    }
}
