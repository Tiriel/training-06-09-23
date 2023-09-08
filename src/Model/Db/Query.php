<?php

namespace App\Model\Db;

use App\Model\Post;

class Query
{
    public function __construct(private Connection $connection) {}

    public function getOneBySlug(string $classname, string $slug): Post
    {
        $table = $this->extractTableName($classname);

        return $this->connection->fetch('SELECT * FROM '.$table.' WHERE slug = :slug', ['slug' => $slug], $classname);
    }

    public function getList(string $classname, int $limit, int $offset): iterable
    {
        $table = $this->extractTableName($classname);

        return $this->connection->fetch('SELECT * FROM '.$table, []);
    }

    public function save(object $object): bool
    {
        return true;
    }

    private function extractTableName(string $classname): string
    {
        $classParts = explode('\\', $classname);

        return strtolower(array_pop($classParts));
    }
}
