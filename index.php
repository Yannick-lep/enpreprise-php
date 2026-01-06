<?php
include 'functions.php';
require 'connexiondb.php';
require 'routes.php';

require PATH_PROJET . '/views/partials/header.php';

$pageFiltre = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$page = $pageFiltre ?? 'home';

if (!array_key_exists($page,$routes)){
   redirect('404.php');
}

require $routes[$page];
die();
?>

<a href="./employe/list-employe.php">Liste des employés</a>

<p>Nombre d'employés' : <?= getNBLineTable($pdo, 'employes'); ?></p>