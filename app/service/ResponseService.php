<?php

namespace WebApp\Service;

class ResponseService
{
    private $response;

    public function  __construct(){
    
    }

    public function getResponse($_data=''){

        $_resp = array('response_code'=>200, 'response_msg'=>'OK', 'title'=>'USER_FETCH', 'message'=>'User details fetched successfully.');
        if($_data)
            $_resp['data'] = $_data;
        $this->response = (object) $_resp;
        return json_encode($this->response);
    }

}