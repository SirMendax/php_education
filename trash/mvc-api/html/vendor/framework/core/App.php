<?php


namespace core;


use core\http\Request;
use core\http\Response;

class App
{
    public static $container;
    public static $request;
    public static $response;

    public function __construct()
    {
        $query = trim($_SERVER['REQUEST_URI'], '/');
        session_start();
        self::$container = Registry::instance();
        $this->getParams();
        self::$request = new Request();
        self::$response = new Response();
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