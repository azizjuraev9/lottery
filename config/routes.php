<?php

/**
 * @var Bramus\Router\Router $router
 */

$router->setNamespace('\app\controllers');

$router->get('/(\d+)','TestController@index');
$router->get('/','TestController@index');
$router->get('/test','TestController@index');