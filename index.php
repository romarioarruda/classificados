<?php
session_start();
require_once "config.php";

spl_autoload_register(function($file){

    if (file_exists('controller/'.$file.'.php')) {

        require_once 'controller/'.$file.'.php';
    }
    else if (file_exists('model/'.$file.'.php')) {

        require_once 'model/'.$file.'.php';
    }
    else if (file_exists('core/'.$file.'.php')) {

        require_once 'core/'.$file.'.php';
    }
});

$core = new Core();
$core->run();