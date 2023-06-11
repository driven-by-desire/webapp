<?php

namespace WebApp\Controller;

class BaseController
{
    private $controller;
    private $req;

    public function  __construct($request) {
        $this->req = $request;
    }

    public function getController($_controller){
        //echo 'ABC---'.$_controller;
    }

    public function test(){
        //echo 'ABC--- TEST';
    }

}