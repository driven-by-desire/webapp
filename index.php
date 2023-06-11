<?php
/** Autoload Namespaces and ENV Files */
require 'vendor/autoload.php';

use Dotenv\Dotenv;

/** Load env file */
# future changes : autoload in Core/Environment Static Class for ease of access rather than $_ENV superglobal
$dotenv = new DotEnv(__DIR__);
$dotenv->load();

/** Step 1 : Set/Get Environment Variables */
# superglobal keys can get modified, should do the same in load() function of dotenv
\WebApp\Core\Environment::setEnv($_ENV);

/** Step 2 : Create Request Object for every request (header, form-data) */
$request = new \WebApp\Service\RequestService();

/** Step 3 : Get Routes for the URI based following RESTful architecture */
$_controller = \WebApp\Helper\Route::getController(); 
# future changes : change hardcode with appropriate function
$_controller = str_replace('"', '', addslashes('"WebApp"Controller"')).$_controller;
if(!class_exists($_controller)){
    # future changes : use Response Class Object to show the Error
    echo \WebApp\Helper\Route::noController();
    die();
}

/** Step 5 : Initialize Controller Class as per URI request  */
$controller = new $_controller($request);

/** Step 6 : process request per MVC architechture with Request object and return as per Response class */
$res = $controller->process($request);
/** Print the JSON response */
echo $res;
?>