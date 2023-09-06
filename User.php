<?php

abstract class User
{
    public function __construct(protected string $name) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    abstract public function __toString(): string;
}
