<?php

$dwes = null;

$config = parse_ini_file('./config.inc.ini');

try {
    $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $dsn = 'mysql:host=' . $config['localhost'] . ';dbname=' . $config['test_dwes'];
    $dwes = new PDO($dsn, $config['prueba'], $config['1234'], $opc);
    $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $ex) {
    throw $ex;
}


