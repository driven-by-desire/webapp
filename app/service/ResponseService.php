<?php

namespace WebApp\Service;

class ResponseService
{
    private $response;

    public function  __construct() {
    
    }

    public function getResponse(){
        $this->response = (object) array('response_code'=>200, 'response_msg'=>'OK', 'title'=>'USER_FETCH', 'message'=>'User details fetched successfully.');

        // $this->response->response_code = 200;
        // $this->response->response_msg = 'OK';
        // $this->response->title = 'USER_FETCH';
        // $this->response->message = 'User details fetched successfully.';

        return json_encode($this->response);
    }
}