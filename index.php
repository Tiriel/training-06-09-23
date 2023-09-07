<?php

use Auth\AuthException;
use User\Admin;
use User\Enum\AdminLevels;
use User\Member;
use Vehicle\Car;
use Blueprint\Car as BlueprintCar;

require_once 'User/Enum/AdminLevels.php';
require_once 'User/User.php';
require_once 'Auth/AuthException.php';
require_once 'Auth/AuthInterface.php';
require_once 'User/Member.php';
require_once 'User/Admin.php';
require_once 'Vehicle/Car.php';
require_once 'Blueprint/Car.php';

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

$car = new Car();
