<?php

namespace WebApp\Model;

class UserModel extends BaseModel
{
    private $model;

    public function  __construct() {
        parent::__construct();
    }

    public function test(){
        echo 'User-Model';
    }

    public function getUsers(){
        return 'User List Here';
    }
}