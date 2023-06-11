<?php
require 'vendor/autoload.php';
//$loader = new \Composer\Autoload\ClassLoader();
//$loader->addPsr4('Controller\\', __DIR__ . '/psr4/control');

//$loader->register();

use Dotenv\Dotenv;
//use WebApp\Core\Environment;
//use WebApp\Helper\Route;
//use WebApp\Service\RequestService;
//use WebApp\Controller\BaseController;

$dotenv = new DotEnv(__DIR__, '.conf');
$dotenv->load();

# Step 1 : Set/Get Environment Variables
# superglobal keys can get modified, should do the same in load() function of dotenv
\WebApp\Core\Environment::setEnv($_ENV);

# now can fetch any env from the singleton class
// $_app_url = Environment::getEnv('APPURL');
// var_dump($_app_url);

# Step 2 : Get Controller for the Route
$request = new \WebApp\Service\RequestService();
//print_r($request->getRequest());
//die();

# Step 3 : Get Routes
//$controller = "\WebApp\Controller\";
$_controller = \WebApp\Helper\Route::getController(); 
$_controller = str_replace('"', '', addslashes('"WebApp"Controller"')).$_controller;
if(!class_exists($_controller)){
    echo \WebApp\Helper\Route::noController();
    die();
}

$controller = new $_controller($request);

# Step 4 : In controller, get request header and response
//$test = new BaseController();
//$test = new \WebApp\Controller\BaseController();
$res = $controller->process($request);
echo $res;
?>