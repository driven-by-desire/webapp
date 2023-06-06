<?php

namespace WebApp\Controller;

class UserController extends BaseController
{
    private $controller;
    private $req;

    public function  __construct($request) {
        parent::__construct($request);
    }

    public function test(){
        echo 'UserTTT';
    }
}