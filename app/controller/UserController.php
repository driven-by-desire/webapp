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

    public function process(\WebApp\Service\RequestService $request){
        //print_r($request);
        $response = new \WebApp\Service\ResponseService();
        $repository = new \WebApp\Model\UserModel();
        switch($request->getRequestMethod()){
            case 'GET':
                $_data = $repository->getUsers();
                return $response->getResponse();
            case 'POST':
                return 1;
            case 'PUT':
                return 1;
            case 'DELETE':
                return 1;
            default:
                return 0;
        }
    }
}