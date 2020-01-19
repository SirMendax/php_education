<?php


define("DEBUG", 1);
define("ROOT", dirname(__DIR__));
define("PUBLIC", ROOT . '/public');

// для подключения к бд
define('DB_USER', 'root');
define('DB_PASS', 'qwerty');
define('DB_HOST', 'db');
define('DB_NAME', 'blog');

require_once ROOT . '/vendor/autoload.php';
