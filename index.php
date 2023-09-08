<?php

require_once 'vendor/autoload.php';

$app = new \App\Application();
$response = $app->run();

echo $response;
