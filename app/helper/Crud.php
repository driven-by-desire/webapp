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

    public function fetchAll($_tablename, $_cols=array()){
        $_col = (count($_cols))? implode(', ', $_cols) : '*';
        $_qry = "SELECT ".$_col." FROM ".$_tablename;
        $_st = $this->db->query($_qry);
        $_st->execute();
        $result = $_st->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}