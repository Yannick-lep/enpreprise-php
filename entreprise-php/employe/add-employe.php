<?php

include dirname(__DIR__) . '/functions.php';
require dirname(__DIR__) . '/connexiondb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {

    // traitement du formulaire
    $prenom = clean($_POST['prenom']);
    $nom = clean($_POST['nom']);
    $sexe = $_POST['sexe']; // enum, pas besoin de clean
    $service = clean($_POST['service']);
    $date_embauche = $_POST['date_embauche'];
    $salaire = clean($_POST['salaire']);

    addEmploye(
        $pdo,
        $prenom,
        $nom,
        $sexe,
        $service,
        $date_embauche,
        $salaire
    );

    // redirection après insertion
    header('Location: ' . WEB_ROOT . '/employe/list-employe.php');
    exit();
}

include PATH_PROJET . '/views/employe/add-employe-view.php';
