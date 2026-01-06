<?php
include dirname(__DIR__) . '/functions.php';
require dirname(__DIR__) . '/connexiondb.php';

if (isset($_GET['employeId'])) {
    $id = $_GET['employeId'];

    $result = deleteEmploye($pdo, $id);

    if ($result) {
        header('Location: ' . WEB_ROOT . '/employe/list-employe.php');
        exit();
    }
}
