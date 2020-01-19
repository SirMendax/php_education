<?php

define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("PUBLIC", ROOT . '/public');
define("SRC", ROOT . '/src');
define("CORE", ROOT . '/vendor/framework/core');
define("LIBS", ROOT . '/vendor/framework/core/libs');
define("CACHE", ROOT . '/storage/cache');
define("CONF", ROOT . '/conf');
define("LAYOUT", 'client');
define("VIEW", ROOT . '/templates/views');

require_once ROOT . '/vendor/autoload.php';