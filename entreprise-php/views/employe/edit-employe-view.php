<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/solar/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <main class="container mt-5">
        <h1 class="text-primary">Editer un chauffeur</h1>
        <?php
        require PATH_PROJET . '/views/partials/header.php';
        ?>
        <form method="post">
            <div class="mb-3">
                <input type="text" class="form-control" name="prenom" value="<?= $employe['prenom'] ?>" required>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="nom" value="<?= $employe['nom'] ?>" required>
            </div>
            <div class="mb-3">
                <select class="form-control" name="sexe" required>
                    <option value="m" <?= $employe['sexe'] === 'm' ? 'selected' : '' ?>>Homme</option>
                    <option value="f" <?= $employe['sexe'] === 'f' ? 'selected' : '' ?>>Femme</option>
                </select>
            </div>
            <div class="mb-3">
                <input class="form-control" type="text" name="service" value="<?= $employe['service'] ?>">
            </div>
            <div class="mb-3">
                <input class="form-control" type="date" name="date_embauche" value="<?= $employe['date_embauche'] ?>">
            </div>
            <div class="mb-3">
                <input class="form-control" type="number" step="0.01" name="salaire" value="<?= $employe['salaire'] ?>">
            </div>

            <button class="btn btn-primary" type="submit" name="envoyer">Modifier l'employé</button>
        </form>

    </main>
</body>

</html>