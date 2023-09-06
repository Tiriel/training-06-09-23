<?php

class Member implements AuthInterface
{
    protected static int $instances = 0;

    public function __construct(
        private string $login,
        private string $password,
        private int $age,
    ) {
        static::$instances++;
    }

    public function __destruct()
    {
        static::$instances--;
    }

    public function auth(string $login, string $password): bool
    {
        if ($login === $this->login && $password === $this->password) {
            return true;
        }

        return false;
    }

    public static function count(): int
    {
        return static::$instances;
    }
}
