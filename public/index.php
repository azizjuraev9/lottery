<?php

$loader = require dirname(__DIR__) . '/vendor/autoload.php';

require dirname(__DIR__) . '/config/doctrine.php';


$router = new \Bramus\Router\Router();

require dirname( __DIR__ ) . '/config/routes.php';

$router->run();