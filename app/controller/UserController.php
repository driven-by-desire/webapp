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
        //$repository = new \WebApp\Model\UserModel();

        $repository = new \WebApp\Model\UserModel();
        switch($request->getRequestMethod()){
            case 'GET':
                //echo '26 UserController';
                $_data  = $repository->getUsers();
                return $response->getResponse($_data);
            case 'POST':
                $_msg  = $repository->createUser($request);
                return $response->getResponse();
            case 'PUT':
                $_msg  = $repository->updateUser($request);
                return $response->getResponse();;
            case 'DELETE':
                return 1;
            default:
                return 0;
        }
    }
}