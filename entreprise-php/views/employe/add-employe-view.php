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
        <h1 class="text-primary">Ajouter un employé</h1>
        <?php
        require PATH_PROJET . '/views/partials/header.php';
        ?>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Prénom</label>
                <input type="text" name="prenom" class="form-control" placeholder="Prénom" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" placeholder="Nom" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Sexe</label>
                <select name="sexe" class="form-select" required>
                    <option value="">-- Sexe --</option>
                    <option value="m">Homme</option>
                    <option value="f">Femme</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Service</label>
                <input type="text" name="service" class="form-control" placeholder="Service">
            </div>

            <div class="mb-3">
                <label class="form-label">Date d'embauche</label>
                <input type="date" name="date_embauche" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Salaire</label>
                <input type="number" step="0.01" name="salaire" class="form-control" placeholder="Salaire">
            </div>

            <button type="submit" name="envoyer" class="btn btn-primary">
                Créer l'employé
            </button>
        </form>


    </main>
</body>

</html>