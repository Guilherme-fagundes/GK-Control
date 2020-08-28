<?php
//DATABASE
define('DB', [
    'host' => 'localhost',
    'user' => 'root',
    'pass' => '',
    'name' => 'gkcontrol',
    'driver' => 'mysql' //default = mysql
]);
//SITE
define('SITE', [
    'base' => "http://localhost/GK-Control",
    "desc" => "Este projeto foi desenvolvido para estudo das novas praticas de desenvolvimento do PHP 7"
]);

define('HOME', "http://localhost/GK-Control"); // Base URI
define('THEME', ''); // Your admin
define('INCLUDE_PATH', 'themes' . DIRECTORY_SEPARATOR . THEME);

//MAIL
define('MAIL', [
    'host' => 'smtp.gmail.com',
    'user' => 'guilhermedev94@gmail.com',
    'pass' => 'Guigui1994',
    'port' => 587
]);

function GK_MESSAGE(string $type, string $message)
{
    echo "<p class=\"message {$type}\">{$message}</p>";
}

