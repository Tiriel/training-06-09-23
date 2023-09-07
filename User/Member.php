<?php

namespace User;

use Auth\AuthException;
use Auth\AuthInterface;

class Member extends User implements AuthInterface
{
    protected static int $instances = 0;

    public function __construct(
        string $name,
        protected string $login,
        protected string $password,
        protected int $age,
    ) {
        parent::__construct($name);
        static::$instances++;
    }

    public function __destruct()
    {
        static::$instances--;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function auth(string $login, string $password): bool
    {
        if ($login === $this->login && $password === $this->password) {
            return true;
        }

        throw new AuthException('Authentication failed.');
    }

    public static function count(): int
    {
        return static::$instances;
    }
}
