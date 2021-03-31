<?php

// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);

use vendor\core\Router;

$query = rtrim($_SERVER['QUERY_STRING'], '/');

include ("../vendor/config.php");

/**
 * автозагрузчик
 */
spl_autoload_register(function($class){
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';    
    if(is_file($file)){
        require_once $file;
    }
});

//Правила маршрутизации//
/**
 * основные правила
 */
Router::add('^main/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Main']);
Router::add('^main/(?P<action>[a-z-]+)', ['controller' => 'Main']);
//Router::add('^main/time', ['controller' => 'Main', 'action' => 'time']);
Router::add('^main/(?P<alias>[a-z-]+)$', ['controller' => 'Main', 'action' => 'index']);
/**
 * правила по умолчанию
 */
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);