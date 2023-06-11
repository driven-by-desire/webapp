<?php

namespace WebApp\Service;

class RequestService
{
    private $request;
    private $args = array();

    public function  __construct(){
        //print_r($_SERVER); die();
        //$this->request['header']            = $_SERVER            ;
        $this->request['SERVER_PROTOCOL']   = $_SERVER['SERVER_PROTOCOL']   ;
        $this->request['REQUEST_METHOD']    = $_SERVER['REQUEST_METHOD']    ;
        $this->request['QUERY_STRING']      = $_SERVER['QUERY_STRING']      ;
        $this->request['REQUEST_URI']       = $_SERVER['REQUEST_URI']       ;
        $this->request['REQUEST_TIME_FLOAT'] = $_SERVER['REQUEST_TIME_FLOAT'] ;
        $this->request['REQUEST_TIME']      = $_SERVER['REQUEST_TIME']      ;
        //$this->request['HTTP_SEC_CH_UA']    = $_SERVER['HTTP_SEC_CH_UA']    ;
        $this->request['HTTP_USER_AGENT']   = $_SERVER['HTTP_USER_AGENT']   ;
        //$this->request['HTTP_COOKIE']       = $_SERVER['HTTP_COOKIE']       ;
        $this->request['REMOTE_ADDR']       = $_SERVER['REMOTE_ADDR']       ;
        $this->request['REQUEST_SCHEME']    = $_SERVER['REQUEST_SCHEME']    ;
        $this->getRequest();
    }

    public function getRequest(){
        if($this->request['REQUEST_METHOD'] == 'POST'){
            $this->request['_data'] = $_POST;
        }
        return $this->request;
    }

    public function getRequestMethod(){
        return $this->request['REQUEST_METHOD'];
    }
}