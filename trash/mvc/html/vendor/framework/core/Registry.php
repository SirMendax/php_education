<?php


namespace framework\core;


use framework\core\traits\SingletonTrait;

class Registry
{
    use SingletonTrait;

    protected static $props = [];

    public function setProp($name, $val)
    {
        self::$props[$name] = $val;
    }

    public function getProp($name)
    {
        if(isset(self::$props[$name])){
            return self::$props[$name];
        }
        return null;
    }

    public static function getProps()
    {
        return self::$props;
    }
}