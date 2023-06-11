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

        $_data = $this->model->fetchAll('users', array('userid', 'username'));
        return $_data;
    }

    public function createUser($_data){
        
        //$_data = $this->model->fetchAll('users', array('userid', 'username'));
        //var_dump($_data); die();
        return $_data;
    }

    public function updateUser($_data){
        return $_data;
    }
}