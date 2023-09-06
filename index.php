<?php

require_once 'AdminLevels.php';
require_once 'AuthInterface.php';
require_once 'Member.php';
require_once 'Admin.php';

// $member is an object instance
$member = new Admin('Ben', 'abcd1234', 36, AdminLevels::SuperAdmin);
$m2 = new Member('Ben2', 'abcd', 36);

$login = $argv[1];
$password = $argv[2];

echo "Members : ". Member::count();
echo "\n";
echo "Admins : ". Admin::count();

unset($m2);
echo "\n";
echo "Members : ". Member::count();

echo "\n";
echo $member->auth($login, $password) ? "You are logged in!\n" : "Wrong login/password\n";
echo $member::class."\n";
//var_dump($member);
