<?php

namespace App\Model\Db;

class Connection
{
    public function __construct(private \PDO $_pdo) {}

    public function fetch(string $stmt, array $params = [], ?string $classname = null): mixed
    {
        $query = $this->_pdo->prepare($stmt);

        foreach ($params as $prop => $value) {
            $query->bindParam($prop, $value);
        }

        if ($classname) {
            return $query->fetchObject($classname);
        }

        return $query->fetch(\PDO::FETCH_ASSOC);
    }

    public function execute(string $stmt, array $params = []): bool|int
    {
        return $this->_pdo->query($stmt)->execute($params);
    }
}
