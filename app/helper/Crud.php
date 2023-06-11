<?php

namespace WebApp\Helper;

use \PDO;
//use WebApp\Core\Darabase;

class Crud
{
    private $db;
    
    public function  __construct() {
        $this->db = \WebApp\Core\Database::getDB();
        //var_dump($this->db); die();  
    }

    public function fetchAll($_tablename){
        $_qry = "SELECT * FROM ".$_tablename;
        //echo $_qry; die();
        //var_dump($this->db); die();  
        $_st = $this->db->query($_qry);
        $_st->execute();

        //print("Fetch all of the remaining rows in the result set:\n");
        $result = $_st->fetchAll(\PDO::FETCH_ASSOC);
        //var_dump($result); die(); 
        return $result;
    }
}