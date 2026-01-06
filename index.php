<?php
include 'functions.php';
require 'connexiondb.php';

require PATH_PROJET . '/views/partials/header.php';

?>

<a href="./employe/list-employe.php">Liste des employés</a>

<p>Nombre d'employés' : <?= getNBLineTable($pdo, 'employes'); ?></p>