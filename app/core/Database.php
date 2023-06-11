<?php

namespace WebApp\Core;
use \PDO;
class Database
{
    private static $db;

    public final function  __construct() {
        self::$db = self::connect();
    }

    public static function connect(){
        //get environment variables
        $_config = \WebApp\Core\Environment::getEnv('DB');
        if (!is_null(self::$db)) {
            return self::$db;
        }
        self::$db = false;
        try {
            $conn_str = "mysql:host=".$_config['host'].";dbname=".$_config['database'];
            self::$db = new PDO($conn_str, $_config['username'], $_config['password']);
            //echo __CLASS__ . " initializes only once <br>";
        } catch(PDOException $e) { 
            print "Error!: " . $e->getMessage() . "<br/>";
            die(); 
        }
        return (self::$db)? self::$db : null;
    }

    public static function getDB(){
        return self::connect();
    }
}