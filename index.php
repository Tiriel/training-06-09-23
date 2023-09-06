<?php

require_once 'AdminLevels.php';
require_once 'Member.php';
require_once 'Admin.php';

// $member is an object instance
$member = new Admin('Ben', 'abcd1234', 36, AdminLevels::SuperAdmin);

$login = $argv[1];
$password = $argv[2];

echo $member->auth($login, $password) ? "You are logged in!\n" : "Wrong login/password\n";
//var_dump($member);
