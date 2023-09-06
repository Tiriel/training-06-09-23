<?php

class Admin extends Member
{
    protected static int $instances = 0;
    protected AdminLevels $level;

    public function __construct(string $login, string $password, int $age, AdminLevels $level = AdminLevels::Admin)
    {
        parent::__construct($login, $password, $age);
        $this->level = $level;
    }

    public function auth(string $login, string $password): bool
    {
        if ($this->level === AdminLevels::SuperAdmin) {
            return true;
        }

        return parent::auth($login, $password);
    }
}
