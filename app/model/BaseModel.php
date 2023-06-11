<?php

namespace WebApp\Model;

class BaseModel
{
    public $model;

    public function  __construct(){
        $_obj = new \WebApp\Helper\Crud();
        $this->model = $_obj;
    }

    public function test(){
        echo 'Base-Model';
    }
}