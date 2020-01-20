<?php


define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("PUBLIC", ROOT . '/public');
define("CONTROLLERS", ROOT . '/src/http/Controllers');
define("MODELS", ROOT . '/src/Models');

define('DB_USER', 'root');
define('DB_PASS', 'qwerty');
define('DB_HOST', 'db');
define('DB_PORT', '3306');
define('DB_NAME', 'api');

require_once ROOT . '/vendor/autoload.php';

