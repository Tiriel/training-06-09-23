<?php

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once 'vendor/autoload.php';

$loader = new FilesystemLoader(__DIR__.'/templates');
$twig = new Environment($loader);


echo $twig->render('index.html.twig', ['member' => 'World']);
