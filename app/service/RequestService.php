<?php

namespace WebApp\Service;

class RequestService
{
    private $request;   // array containing 1. header info 2. form-data info
    private $args = array();     # future : check for non rest parameters in URI : if so give error

    public function  __construct(){
        //$t = file_get_contents("php://input");
        //print_r($t); die();
        $this->request['_data'] = $this->getPutData();
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

    public function getPutData(){
        # https://bugs.php.net/bug.php?id=55815#:~:text=Basically%2C%20a%20request%20sent%20%28with%20files%20and%2For%20non-file,%24_PUT%20superglobals%20should%20be%20populated%20in%20PUT%20requests.
        # PUT : no data in $_POST and $_FILES (for files)
        # create method for Put to get form-data and files
        $_input = file_get_contents("php://input");
        $str1 = "form-data";
        $_chk = strpos($_input, $str1);

        $_data = array();
        if(!$_chk)
            return $_data;
        $_chunks = explode("form-data", $_input);       // before this check if form-data exists in string or not
        unset($_chunks[0]);
        foreach($_chunks as $key=>$chunk){
            $subchunk = explode("\n", $chunk);
            $_key = $this->get_string_between($subchunk[0], '"', '"');
            $_val = substr($subchunk[2], 0, -1);
            $_data[$_key] = $_val;                      // future : work on file details for $_FILE
        }
        
        return $_data;
        // print_r($_data); 
        // die();
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

    private function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }
}