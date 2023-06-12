<?php

namespace WebApp\Model;
use WebApp\Helper\Crud;
class UserModel extends BaseModel
{
    private $table = 'users';

    public function  __construct() {
        parent::__construct();
    }

    public function test(){
        echo 'User-Model';
    }

    public function getUsers(){

        $_data = $this->model->fetchAll($this->table, array('userid', 'username'));
        return $_data;
    }

    public function createUser($_request){
        $_request = $_request->getRequest();
        $_data = $_request['_data'];

        $_res = $this->model->createRecord($this->table, $_data);
        return $_res;
    }

    public function updateUser($_request){
        $_request = $_request->getRequest();
        $_data = $_request['_data'];

        $_res = $this->model->updateRecord($this->table, $_data);
        return $_data;
    }
}