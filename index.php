<?php

use App\User\Member;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once 'vendor/autoload.php';

$loader = new FilesystemLoader(__DIR__.'/templates');
$twig = new Environment($loader);

$member = new Member('Benjamin', 'ben', 'abcd1234', 36);

echo $twig->render('index.html.twig', ['member' => $member->getName()]);
