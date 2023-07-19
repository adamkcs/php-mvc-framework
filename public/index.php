<?php

/* 
Set composer autoload
    1) PSR4 autoload in composer.json
    2) Update composer to create the autoloader
    >> 3) Require autoloader <<
    4) Use the correct namespace for autoload
*/
require_once __DIR__ . '/../vendor/autoload.php';

use app\core\Application;

$app = new Application(dirname(__DIR__));

$app->router->get('/', 'home');
$app->router->get('/contact', 'contact');

$app->run();

?>