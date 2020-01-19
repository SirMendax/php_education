<?php

require_once dirname(__DIR__) . '/conf/constant.php';
require_once dirname(__DIR__) . '/vendor/framework/helpers/functions.php';

use core\App;
use core\Router;

$app = new App();
$params = $app::$container->getProps();

$router = new Router('/' . $app::$request->getUrl(), $app::$request->getMethod(), $app::$response);

require_once dirname(__DIR__) . '/conf/routes.php';

$router->run();
$app::$response->render();
