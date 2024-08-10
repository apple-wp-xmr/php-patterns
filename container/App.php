<?php

namespace Core;

class App {
    protected static $container;

    public static function setContainer($container)
    {
        static::$container = $container;
    }

    public static function container()
    {
       return static::$container;
    }

    public static function bind($key, $resolver)
    {
        return self::container()->bind($key, $resolver);
    }

    public static function reslove($key)
    {
        return self::container()->resolve($key);
    }
}