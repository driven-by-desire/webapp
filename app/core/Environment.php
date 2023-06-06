<?php

namespace WebApp\Core;

class Environment
{
    private static $env;

    private final function  __construct() {
        echo __CLASS__ . " initializes only once\n";
    }

    public static function getEnv($arg='') {
        if(!isset(self::$env)) {
            self::$env = new Environment();
        }
        if($arg){
            if(isset(self::$env[$arg])){
                return self::$env[$arg];
            }else{
                # WRONG ENV Exception
                return FALSE;
            }
        }else{
            return NULL;
        }
        //return ($arg && isset(self::$env[$arg]))? self::$env[$arg] : self::$env;
    }

    public static function setEnv($_data){
        // self::$env = implode(', ', $_data);
        //self::$env = array_values($_data);
        self::$env = $_data;
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