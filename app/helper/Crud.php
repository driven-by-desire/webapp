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

    public function createRecord($_tablename, $_data){
        $_sql  = "INSERT INTO ".$_tablename." ( ".implode(', ', array_keys($_data))." ) ";
        $_sql .= "VALUES ( :".implode(', :', array_keys($_data))." )";

        $query = $this->db->prepare($_sql);
        foreach($_data as $col => &$val){
            $col = ":".$col;
            $query->bindParam($col, $val);    
        }
        $res = $query->execute();
        return $res;
    }

    public function fetchAll($_tablename, $_cols=array()){
        $_col = (count($_cols))? implode(', ', $_cols) : '*';
        $_qry = "SELECT ".$_col." FROM ".$_tablename." ORDER BY ".$_cols[0]." DESC";
        $_st = $this->db->query($_qry);
        $_st->execute();
        $result = $_st->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateRecord($_tablename, $_data, $_where){
        $_sql  = "UPDATE ".$_tablename." SET ";
        $_sql .= implode(',', array_map(function($val1, $val2) {
            return sprintf("%s='%s'", $val1, $val2);
        }, array_keys($_data), array_values($_data)));
        $_sql .= "WHERE ";
        $_sql .= implode(' AND ', array_map(function($val1, $val2) {
            return sprintf("%s='%s'", $val1, $val2);
        }, array_keys($_where), array_values($_where)));

        echo $_sql; die();

        $_sql .= "VALUES ( :".implode(', :', array_keys($_data))." )";

        $query = $this->db->prepare($_sql);
        foreach($_data as $col => &$val){
            $col = ":".$col;
            $query->bindParam($col, $val);    
        }
        $res = $query->execute();
        return $res;
    }

    private function getPDOParam($_datavalue){
        switch(gettype($_datavalue)){
            case 'integer':
                return PDO::PARAM_INT;
                break;
            case 'string':
                return PDO::PARAM_STR;
                break;
            default:
                return PDO::PARAM_STR;
                break;

        }
    }
}