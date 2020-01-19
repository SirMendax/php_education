<?php


namespace framework\core\traits;


trait SingletonTrait
{
    private static $instance;
    public static function instance()
    {
        if(self::$instance === null)
        {
            self:;self::$instance = new self;
        }
        return self::$instance;
    }
}