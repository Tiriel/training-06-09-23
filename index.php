<?php

require_once 'AdminLevels.php';
require_once 'User.php';
require_once 'AuthException.php';
require_once 'AuthInterface.php';
require_once 'Member.php';
require_once 'Admin.php';

// $member is an object instance
$member = new Admin('Benjamin', 'Ben', 'abcd1234', 36, AdminLevels::Admin);
$m2 = new Member('Blob', 'Ben2', 'abcd', 36);

$login = $argv[1];
$password = $argv[2];

echo "Members : ". Member::count();
echo "\n";
echo "Admins : ". Admin::count();

unset($m2);
echo "\n";
echo "Members : ". Member::count();

echo "\n";

try {
    if ($member->auth($login, $password)) {
        echo "You are logged in!\n";
    }
} catch (AuthException) {
    echo "Wrong login/password.\n";
}

echo $member::class."\n";
echo $member."\n";
//var_dump($member);
