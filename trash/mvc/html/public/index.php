<?php

require_once dirname(__DIR__) . '/conf/constant.php';
require_once CONF . '/routes.php';

new \framework\core\App();

$params = \framework\core\App::$container->getProps();
