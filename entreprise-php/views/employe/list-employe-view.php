<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/solar/bootstrap.min.css">
    <title>Liste des employés</title>
</head>

<body>
    <main class="container">

        <?php
        if (count($employeArray) === 0) :
            echo '<h3>Aucun employé enregistré</h3>';
            echo '<a href="' . WEB_ROOT . '/employe/add-employe.php" class="btn btn-secondary mb-3">Ajouter un employé</a>';
            die();
        endif;
        ?>

        <h1 class="text-primary">Liste des employés</h1>

        <?php
        require PATH_PROJET . '/views/partials/header.php';
        ?>

        <a href="<?= WEB_ROOT ?>/employe/add-employe.php" class="btn btn-secondary mb-3">
            Ajouter un employé
        </a>

        <table class="table table-hover">
            <thead>
                <tr class="table-primary">
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Sexe</th>
                    <th>Service</th>
                    <th>Date embauche</th>
                    <th>Salaire</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($employeArray as $employe) : ?>
                    <tr>
                        <td class="table-secondary"><?= $employe['prenom'] ?></td>
                        <td class="table-secondary"><?= $employe['nom'] ?></td>
                        <td class="table-secondary"><?= strtoupper($employe['sexe']) ?></td>
                        <td class="table-secondary"><?= $employe['service'] ?></td>
                        <td class="table-secondary"><?= $employe['date_embauche'] ?></td>
                        <td class="table-secondary"><?= $employe['salaire'] ?> €</td>
                        <td class="table-secondary">
                            <a href="<?= WEB_ROOT ?>/employe/edit-employe.php?employeId=<?= $employe['id_employes'] ?>"
                               class="btn btn-info btn-sm">
                                Edit
                            </a>

                            <a href="<?= WEB_ROOT ?>/employe/delete-employe.php?employeId=<?= $employe['id_employes'] ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet employé ?')">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </main>
</body>
</html>
