<?php

namespace WebApp\Core;

class Environment
{
    private static $env;

    private final function  __construct() {
        echo __CLASS__ . " initializes only once\n";
    }

    public static function getEnv($arg='') {
        switch ($arg){
            case 'DB':
                return self::getDBEnv();
            default:
                return self::$env;
        }
    }

    public static function setEnv($_data){
        // self::$env = implode(', ', $_data);
        //self::$env = array_values($_data);
        self::$env = $_data;
    }

    public static function getDBEnv() {
        $_returnData['host'] = self::$env['DB_HOST'];
        $_returnData['port'] = self::$env['DB_PORT'];
        $_returnData['database'] = self::$env['DB_DATABASE'];
        $_returnData['username'] = self::$env['DB_USERNAME'];
        $_returnData['password'] = self::$env['DB_PASSWORD'];
        return $_returnData;
    }

    /*
    private $env;

    public function test(){
        echo 'this is a test env';
    }

    public function test2(){
        var_dump($this->env);
    }

    public function setEnv($_data){
        $this->env = $_data;
    }
    */
}
?>