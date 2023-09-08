<?php

require_once 'vendor/autoload.php';

$sql = <<<SQL
CREATE TABLE IF NOT EXISTS post (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    content BLOB NOT NULL,
    published_at DATETIME NOT NULL,
    author VARCHAR(255) NOT NULL 
);
SQL;

$container = \App\Container::create();
/** @var \App\Model\Db\Connection $connection */
$connection = $container->get(\App\Model\Db\Connection::class);

var_dump($connection->execute($sql));
