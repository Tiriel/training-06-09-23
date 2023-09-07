<?php

namespace App\DesignPatterns\Decorator;

use App\DesignPatterns\Proxy\QueryInterface;
use Psr\Log\LoggerInterface;

class TraceableDbQuery implements QueryInterface
{
    public function __construct(
        protected QueryInterface $inner,
        protected LoggerInterface $logger
    ) {}

    public function select(string $select): mixed
    {
        $this->logger->log('info', sprintf("New select query : %s", $select));

        return $this->inner->select($select);
    }

    public function insert(string $insert): bool
    {
        $this->logger->log('info', sprintf("New insert query : %s", $insert));

        return $this->inner->insert($insert);
    }
}
