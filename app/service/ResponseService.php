<?php

namespace WebApp\Service;

class ResponseService
{
    private $response;

    public function  __construct(){
    
    } 

    public function sendGetResponse($_data){
        $_http_code = ($_data)? '200' : '204';
        $_resp = $this->getHTTPresp($_http_code);
        $_resp['data'] = (!empty($_data))? $_data : '';
        $this->response = (object) $_resp;
        return json_encode($this->response);
    }
    
    /**
     * Parameter Bool
     * 1- created 0-failed
     */
    public function sendPostResponse($_res){
        $_http_code = ($_res)? '201' : '417';
        $_resp = $this->getHTTPresp($_http_code);
        $this->response = (object) $_resp;
        return json_encode($this->response);
    }

    protected function sendPutResponse($_res){
        $_http_code = ($_res)? '200' : '204';
    }

    protected function sendDeleteResponse($_data){
        // $_http_code = ($_data)? '201' : '';
    }

    private function getHTTPresp($_code){
        $http = array(
            "100" => "Continue",
            "101" => "Switching Protocols",
            "200" => "OK",
            "201" => "Created",
            "202" => "Accepted",
            "203" => "Non Authorative Information",
            "204" => "No Content",
            "205" => "Reset Content",
            "206" => "Partial Content",
            "300" => "Multiple Choices",
            "301" => "Moved Permanently",
            "302" => "Found",
            "303" => "See Other",
            "304" => "Not Modified",
            "305" => "Use Proxy",
            "306" => "(Unused)",
            "307" => "Temporary Redirect",
            "400" => "Bad Request",
            "401" => "Unauthorized",
            "402" => "Payment Required",
            "403" => "Forbidden",
            "404" => "Not Found",
            "405" => "Method Not Allowed",
            "406" => "Not Acceptable",
            "407" => "Proxy Authentication Required",
            "408" => "Request Timeout",
            "409" => "Conflict",
            "410" => "Gone",
            "411" => "Length Required",
            "412" => "Precondition Failed",
            "413" => "Request Entity Too Large",
            "414" => "Request-URI Too Long",
            "415" => "Unsupported Media Type",
            "416" => "Requested Range Not Satisfiable",
            "417" => "Expectation Failed",
            "500" => "Internal Server Error",
            "501" => "Not Implemented",
            "502" => "Bad Gateway",
            "503" => "Service Unavailable",
            "504" => "Gateway Timeout",
            "505" => "HTTP Version Not Supported"
        );

        $http_title = array(
            "1" => "Information",
            "2" => "Successful",
            "3" => "Redirection",
            "4" => "Client Error",
            "5" => "Server Error"
        );

        //echo substr($_code, 0, 1); die();
        $_out['response_http_code'] = $_code;
        $_out['response_http_title'] = $http_title[substr($_code, 0, 1)];
        $_out['response_http_msg'] = $http[$_code];

        return $_out;
    }
}