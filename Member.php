<?php

class Member
{
    public function __construct(
        private string $login,
        private string $password,
        private int $age,
    ) {}

    public function auth(string $login, string $password): bool
    {
        if ($login === $this->login && $password === $this->password) {
            return true;
        }

        return false;
    }
}
