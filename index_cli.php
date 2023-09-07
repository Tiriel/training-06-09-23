<?php

use App\Auth\AuthException;
use App\DesignPatterns\Decorator\DecoratorBold;
use App\DesignPatterns\Decorator\DecoratorItalic;
use App\DesignPatterns\Decorator\Pen;
use App\DesignPatterns\Factory\PenDecorators;
use App\DesignPatterns\Factory\PenFactory;
use App\User\Admin;
use App\User\Enum\AdminLevels;
use App\User\Member;

require_once 'vendor/autoload.php';

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

$pen = PenFactory::create(PenDecorators::Bold, PenDecorators::Italic);
echo $pen->write('Is it working?')."\n";
