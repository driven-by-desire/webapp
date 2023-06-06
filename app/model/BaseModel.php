<?php

namespace WebApp\Model;

class BaseModel
{
    private $model;
    private $db;

    public function  __construct(){
        $this->db = new \WebApp\Core\Database();
    }

    public function test(){
        echo 'Base-Model';
    }
}