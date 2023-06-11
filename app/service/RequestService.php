<?php

namespace WebApp\Service;

class RequestService
{
    private $request;   // array containing 1. header info 2. form-data info
    private $args = array();     # future : check for non rest parameters in URI : if so give error

    public function  __construct(){
        //print_r($_SERVER); die();
        $this->request['header'] = $this->getServerHeader();     // set header     
        $this->request['_data'] = $this->getPostData();     // set header     

        $this->getRequest();
    }

    public function getRequest(){
        return $this->request;
    }

    public function getRequestMethod(){
        return $this->request['header']['REQUEST_METHOD'];
    }

    public function getPostData(){
        $_postdata = $_POST;    # future : sanitize $_POST data as per int, str
        $_data = ($this->getRequestMethod() == 'POST')? $_postdata : FALSE;
        return $_data;
    }

    public function getServerHeader(){

        $header['SERVER_PROTOCOL']   = $_SERVER['SERVER_PROTOCOL']   ;
        $header['REQUEST_METHOD']    = $_SERVER['REQUEST_METHOD']    ;
        $header['QUERY_STRING']      = $_SERVER['QUERY_STRING']      ;
        $header['REQUEST_URI']       = $_SERVER['REQUEST_URI']       ;
        $header['REQUEST_TIME_FLOAT'] = $_SERVER['REQUEST_TIME_FLOAT'] ;
        $header['REQUEST_TIME']      = $_SERVER['REQUEST_TIME']      ;
        $header['HTTP_USER_AGENT']   = $_SERVER['HTTP_USER_AGENT']   ;
        $header['REMOTE_ADDR']       = $_SERVER['REMOTE_ADDR']       ;
        $header['REQUEST_SCHEME']    = $_SERVER['REQUEST_SCHEME']    ;

        return $header;
    }
}