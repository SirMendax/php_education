<?php

include '../config/base.php';

use framework\Router;

// create object of request and response class
$request = new framework\http\Request();
$response = new framework\http\Response();

$response->setHeader('Access-Control-Allow-Origin: *');
$response->setHeader("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
$response->setHeader('Content-Type: application/json; charset=UTF-8');
// set request url and method

$router = new Router('/' . $request->getUrl(), $request->getMethod());
require '../routes/api.php';
try {
  $router->run();
} catch (Exception $e) {
  echo $e->getMessage();
}
$response->render();
