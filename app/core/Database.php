<?php

namespace WebApp\Core;

class Database
{
    private static $db;

    public final function  __construct() {
        $this->db = $this->connect();
        echo __CLASS__ . " initializes only once\n";
    }

    public static function connect(){
        //get environment variables
        echo 'Get Variables';
        $_data = \WebApp\Core\Environment::getEnv('DB');
        var_dump($_data);
        die();
    }
}