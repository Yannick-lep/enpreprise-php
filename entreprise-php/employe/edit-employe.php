<?php
include dirname(__DIR__) . '/functions.php';
require dirname(__DIR__) . '/connexiondb.php';

$idEditEmploye = $_GET['employeId'] ?? null;

if (!is_numeric($idEditEmploye)) {
    dd("ID non numérique");
}

// Récupération de l'employé à modifier
$employe = getEmploye($pdo, $idEditEmploye);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {

    $prenom = clean($_POST['prenom']);
    $nom = clean($_POST['nom']);
    $sexe = $_POST['sexe'];
    $service = clean($_POST['service']);
    $date_embauche = $_POST['date_embauche'];
    $salaire = clean($_POST['salaire']);

    updateEmploye(
        $pdo,
        $idEditEmploye,
        $prenom,
        $nom,
        $sexe,
        $service,
        $date_embauche,
        $salaire
    );

    header('Location: ' . WEB_ROOT . '/employe/list-employe.php');
    exit();
}

include PATH_PROJET . '/views/employe/edit-employe-view.php';
