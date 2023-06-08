<?php

namespace WebApp\Core;
use \PDO;
class Database
{
    private static $db;

    public final function  __construct() {
        self::$db = $this->connect();
        echo __CLASS__ . " initializes only once\n";
    }

    public static function connect(){
        //get environment variables
        // echo 'Get Variables';
        $_data = \WebApp\Core\Environment::getEnv('DB');
        // var_dump($_data);
        // die();

        if (!is_null(self::$db)) {
            return self::$db;
        }
        self::$db = false;
        try {
            $conn_str = "mysql:host=".$_data['host'].";dbname=".$_data['database'];
            self::$db = new PDO($conn_str, $_data['username'], $_data['password']);
        } catch(PDOException $e) { echo $e->getMessage(); }
        return self::$db;
    }
}