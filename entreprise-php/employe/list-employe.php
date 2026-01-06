<?php 
include dirname(__DIR__) . '/functions.php';
require dirname(__DIR__) . '/connexiondb.php';

$employeArray = listerEmployes($pdo);

include PATH_PROJET . '/views/employe/list-employe-view.php';
?>