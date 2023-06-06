<?php

namespace WebApp\Helper;

class Route
{
    private static $controller;
    private static $args = array();

    private final function  __construct() {
        
    }

    public static function getController(){

        $uri = explode('/', $_SERVER["REQUEST_URI"]);
        self::$controller = $uri[2];
        unset($uri[0]); unset($uri[1]); unset($uri[2]); 
        self::$args = $uri;

        return ucwords(self::$controller).'Controller';
    }
}