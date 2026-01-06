<?php
// Inclure les fonctions et la DB depuis la racine du projet
require_once __DIR__ . '/../functions.php';
require_once __DIR__ . '/../connexiondb.php';
require_once __DIR__ . '/../views/employe/add-employe-view.php';


// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {

    $prenom = clean($_POST['prenom']);
    $nom = clean($_POST['nom']);
    $sexe = $_POST['sexe'];
    $service = clean($_POST['service']);
    $date_embauche = $_POST['date_embauche'];
    $salaire = clean($_POST['salaire']);

    addEmploye($pdo, $prenom, $nom, $sexe, $service, $date_embauche, $salaire);

    // Redirection après insertion
    redirect('/employe/list-employe.php');
}

// Inclure la vue
require_once __DIR__ . '/../views/employe/add-employe-view.php';
?>
<?php
echo "add-employe.php trouvé !";
