<?php

require_once '../vendor/autoload.php';
ini_set('display_errors', 1);


define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/app');
define('SRC', dirname(__DIR__) . '/src');

require_once APP . '/bootstrap.php';

$session = new \Src\Session\Session();
$session->start();

$router = new \Src\Router();
$router->run();



