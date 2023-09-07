<?php

namespace App\Auth;
interface AuthInterface
{
    public function auth(string $login, string $password): bool;
}
