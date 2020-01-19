<?php


namespace framework\core;


class Router
{
    protected static $routes = [];
    protected static $route = [];

    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function dispatch($url)
    {
        $url = self::removeQueryString($url);
        if (self::matchRoute($url)) {
            $controller = 'src\controllers\\' . self::$route['prefix'] . self::upperCamelCase(self::$route['controller']) . 'Controller';
            if(class_exists($controller)){
                $controllerObj = new $controller(self::$route);
                $action = self::$route['action'];
                if(method_exists($controllerObj, $action)){
                    $controllerObj->$action();
                    $controllerObj->getView();
                }else{
                    throw new \Exception("Action $controller::$action not found", 404);
                }
            }else{
                throw new \Exception("Controller $controller not found", 404);
            }
        } else {
            throw new \Exception("Page not Found", 404);
        }
    }

    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route){
            if(preg_match("#{$pattern}#", $url, $matches)){
                foreach ($matches as $key => $val){
                    if(is_string($key)){
                        $route[$key] = $val;
                    }
                }
                if(empty($route['action'])){
                    $route['action'] = 'index';
                }
                if(!isset($route['prefix'])){
                    $route['prefix'] = '';
                }else{
                    $route['prefix'] .= '\\';
                }
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    protected static function upperCamelCase($str)
    {
       return str_replace(' ', '',ucwords(str_replace('-', ' ', $str)));
    }

    protected static function lowerCamelCase($str)
    {
        return ucfirst(self::upperCamelCase($str));
    }
    protected static function removeQueryString($url)
    {
        if($url){
            $params = explode('&', $url, 2);
        }
        return $url;
    }
}