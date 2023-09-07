<?php

namespace App\DesignPatterns\Iterator;

class StepIterator implements \Iterator, \Countable
{
    protected array $keys;
    protected array $values;
    protected int $pos = 0;
    protected readonly int $total;
    protected readonly int $step;
    public function __construct(
        array $data,
        int $step,
    ) {
        $this->keys = array_keys($data);
        $this->values = array_values($data);
        $this->total = count($data);
        $this->step = $step;
    }

    public function current(): mixed
    {
        return $this->values[$this->pos];
    }

    public function next(): void
    {
        $this->pos += $this->step;
    }

    public function key(): mixed
    {
        return $this->keys[$this->pos];
    }

    public function valid(): bool
    {
        return $this->pos < $this->total;
    }

    public function rewind(): void
    {
        $this->pos = 0;
    }

    public function count(): int
    {
        return $this->total;
    }

    public function asGenerator(): \Generator
    {
        foreach ($this as $key => $value) {
            yield $key => $value;
        }
    }
}
