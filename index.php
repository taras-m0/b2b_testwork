<?php
/**
 * For www.
 * User: ttt
 * Date: 29.11.2019
 * Time: 10:20
 */

$config = include "./config.php";
require_once(__DIR__ . '/vendor/autoload.php');

ActiveRecord\Config::initialize(function($cfg) use ($config)
{
    $cfg->set_model_directory('.');
    $cfg->set_connections(array('development' => "mysql://" . $config['user'] . ":" . $config['pass']
        . "@" . $config['host'] . "/" . $config['name']));
});

$controller = new controller();
$method =  str_replace('/', '', $_SERVER['REQUEST_URI']);
$method = preg_replace('/\?.*/', '', $method);
if(method_exists($controller, $method)){
    print $controller->{$method}();
}