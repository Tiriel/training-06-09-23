<?php

require_once 'Member.php';

$member = new Member('Ben', 'abcd1234', 36);

$login = $argv[1];
$password = $argv[2];

echo $member->auth($login, $password) ? "You are logged in!\n" : "Wrong login/password\n";
