<?php


namespace framework\core;


class App
{
    public static $container;

    public function __construct()
    {
        $query = trim($_SERVER['REQUEST_URI'], '/');
        session_start();
        self::$container = Registry::instance();
        $this->getParams();
        new ExceptionHandler();
        Router::dispatch($query);
    }

    protected function getParams()
    {
        $params = require_once CONF . '/conf.php';
        if(!empty($params)){
            foreach($params as $key => $val){
                self::$container->setProp($key, $val);
            }
        }

    }
}