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

        $response = new \WebApp\Service\ResponseService();
        $repository = new \WebApp\Model\UserModel();
        
        switch($request->getRequestMethod()){
            case 'GET':     // Postman check : 28ms for all listing
                $_data  = $repository->getUsers();
                return $response->sendGetResponse($_data);
            case 'POST':    // Postman check : 36ms for single row creation
                $_res  = $repository->createUser($request);
                return $response->sendPostResponse($_res);
            case 'PUT':     // Postman check : 29ms for single row updation
                $_res  = $repository->updateUser($request);     // updateid as csv for columns to check
                return $response->sendPutResponse($_res);
            case 'DELETE':
                return 1;
            default:
                return 0;
        }
    }
}