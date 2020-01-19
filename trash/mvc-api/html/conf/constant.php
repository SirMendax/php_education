<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("PUBLIC", ROOT . '/public');
define("SRC", ROOT . '/src');
define("CORE", ROOT . '/vendor/framework/core');
define("LIBS", ROOT . '/vendor/framework/libs');
define("CACHE", ROOT . '/tmp/cache');
define("CONF", ROOT . '/conf');
define("CONTROLLERS", ROOT . '/src/controllers');

require_once ROOT . '/vendor/autoload.php';