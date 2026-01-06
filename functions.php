<?php
define('PATH_PROJET', __DIR__);  // racine du projet
define('WEB_ROOT', '/entreprise-php');  // URL depuis localhost

function dg($data) {
    echo '<pre style="background-color:#000;color:#fff;padding:10px">';
    var_dump($data);
    echo '</pre>';
}

function dd($data) {
    dg($data);
    die();
}

function clean($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// CRUD Employés
function listerEmployes($pdo) {
    $stmt = $pdo->prepare("SELECT * FROM employes");
    $stmt->execute();
    return $stmt->fetchAll();
}

function getEmploye($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM employes WHERE id_employes=:id");
    $stmt->execute(['id'=>$id]);
    return $stmt->fetch();
}

function addEmploye($pdo, $prenom, $nom, $sexe, $service, $date_embauche, $salaire) {
    $stmt = $pdo->prepare("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES (:prenom,:nom,:sexe,:service,:date_embauche,:salaire)");
    $stmt->execute([
        'prenom'=>$prenom, 'nom'=>$nom, 'sexe'=>$sexe,
        'service'=>$service, 'date_embauche'=>$date_embauche, 'salaire'=>$salaire
    ]);
}

function updateEmploye($pdo, $id, $prenom, $nom, $sexe, $service, $date_embauche, $salaire) {
    $stmt = $pdo->prepare("UPDATE employes SET prenom=:prenom, nom=:nom, sexe=:sexe, service=:service, date_embauche=:date_embauche, salaire=:salaire WHERE id_employes=:id");
    $stmt->execute([
        'id'=>$id, 'prenom'=>$prenom, 'nom'=>$nom, 'sexe'=>$sexe,
        'service'=>$service, 'date_embauche'=>$date_embauche, 'salaire'=>$salaire
    ]);
}

function deleteEmploye($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM employes WHERE id_employes=:id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}

if (!function_exists('redirect')) {
    function redirect($url) {
        header('Location: ' . WEB_ROOT . $url);
        exit();
    }
}
