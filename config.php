<?php
require_once "environment.php";

$config = array();

if (ENVIRONMENT == 'development') {

    define('BASE_URL', 'http://localhost:8080/classificados_mvc/');
    $config['dbname']  = 'classificados';
    $config['host']    = 'localhost';
    $config['dbuser']  = 'root';
    $config['dbpass']  = '';
    $config['charset'] = 'utf8';

} else {

    define('BASE_URL', 'http://site.com.br/');
    $config['dbname']  = 'classificados';
    $config['host']    = 'localhost';
    $config['dbuser']  = 'root';
    $config['dbpass']  = '';
    $config['charset'] = 'utf8';
}

global $conn;
try {

    $conn = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'].";charset=".$config['charset'], $config['dbuser'], $config['dbpass']);

} catch (Throwable $err) {

    exit('<h1>Erro na conexão: '.$err->getMessage().'</h1>');
}