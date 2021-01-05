<?php

//use DI\ContainerBuilder;
use Pecee\SimpleRouter\SimpleRouter;

require_once __DIR__ . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();


SimpleRouter::setDefaultNamespace('\App\http\controllers');

// Start the routing
SimpleRouter::start();