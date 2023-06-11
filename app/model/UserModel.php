<?php

namespace WebApp\Model;
use WebApp\Helper\Crud;
class UserModel extends BaseModel
{

    public function  __construct() {
        parent::__construct();
    }

    public function test(){
        echo 'User-Model';
    }

    public function getUsers(){
        // //var_dump($this->db); die();
         //var_dump($this->model->crud); die();
        // $crud = new Crud($this->db);
        $_data = $this->model->fetchAll('users');
        return $_data;
    }
}