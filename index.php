<?php
require 'vendor/autoload.php';
use Dotenv\Dotenv;
use WebApp\Core\Environment;

$dotenv = new DotEnv(__DIR__, '.conf');
$dotenv->load();

var_dump($_ENV);

$env = new Environment();
$env->test();
?>