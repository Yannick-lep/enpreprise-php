<?php

define("PATH_PROJET", $_SERVER['DOCUMENT_ROOT'] . "/FOAD_19122025");
define("WEB_ROOT", "/FOAD_19122025");

function dg($data)
{
    echo '<pre style="background-color: #000; color: #fff; padding: 10px">';
    var_dump($data);
    echo '</pre>';
};

function dd($data)
{
    echo '<pre style="background-color: #000; color: #fff; padding: 10px">';
    var_dump($data);
    echo '</pre>';
    die();
};

/* =========================
   READ – Lister les employés
========================= */
function listerEmployes($pdo)
{
    $sql = "SELECT * FROM employes";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}

/* =========================
   READ – Récupérer 1 employé
========================= */
function getEmploye($pdo, $id)
{
    $sql = "SELECT * FROM employes WHERE id_employes = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}

/* =========================
   CREATE – Ajouter un employé
========================= */
function addEmploye($pdo, $prenom, $nom, $sexe, $service, $date_embauche, $salaire)
{
    $sql = "INSERT INTO employes 
            (prenom, nom, sexe, service, date_embauche, salaire)
            VALUES (:prenom, :nom, :sexe, :service, :date_embauche, :salaire)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'prenom' => $prenom,
        'nom' => $nom,
        'sexe' => $sexe,
        'service' => $service,
        'date_embauche' => $date_embauche,
        'salaire' => $salaire
    ]);
}

/* =========================
   UPDATE – Modifier un employé
========================= */
function updateEmploye($pdo, $id, $prenom, $nom, $sexe, $service, $date_embauche, $salaire)
{
    $sql = "UPDATE employes SET
            prenom = :prenom,
            nom = :nom,
            sexe = :sexe,
            service = :service,
            date_embauche = :date_embauche,
            salaire = :salaire
            WHERE id_employes = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $id,
        'prenom' => $prenom,
        'nom' => $nom,
        'sexe' => $sexe,
        'service' => $service,
        'date_embauche' => $date_embauche,
        'salaire' => $salaire
    ]);
}

/* =========================
   DELETE – Supprimer un employé
========================= */
function deleteEmploye($pdo, $id)
{
    $sql = "DELETE FROM employes WHERE id_employes = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}

function getLastInsertId($pdo)
{
    $sql = "SELECT LAST_INSERT_ID()";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $last_insert_id = $stmt->fetch();
    return $last_insert_id;
}

function getNBLineTable($pdo, $table)
{
    $sql = "SELECT COUNT(*) as nb FROM `" . $table . "`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    return $count;
}

function createDatabase($pdo, $sqlfile) {
    $query = file_get_contents($sqlfile);
    $pdo->exec($query);
};

function redirect($url){
    header('Location: '. WEB_ROOT . $url);
    exit();
}

function clean($dataParam)
{
    $data = trim($dataParam);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

function redirect($url){
    require $url;
    die();
}