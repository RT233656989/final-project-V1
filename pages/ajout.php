<?php
require("../inc/connection.php");
include("../inc/fonction.php");
include("header/header.php");
$liste_cat = get_cat();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'objet</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card mt-5 rounded-4 border-0 w-50">
                <form class="card-body p-5" action="t_uploadobj.php" method="post" enctype="multipart/form-data">
                    <div class="alert alert-primary text-center text-dark" role="alert">
                        Ajouter un Objet dans la liste
                    </div>

                    <div class="mb-3 text-center text-secondary">
                        <small>Veuillez saisir les informations de l'objet</small>
                    </div>

                    <label for="cat" class="form-label">Catégorie</label>
                    <select name="cat" id="cat" class="form-select mt-3" required>
                        <?php foreach($liste_cat as $categorie): ?>
                            <option value="<?= $categorie['id_categorie'] ?>">
                                <?= $categorie['nom_categorie'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <div class="mb-3 mt-3">
                        <label for="nom" class="form-label">Nom de l'objet</label>
                        <input type="text" id="nom" class="form-control" name="nom" required>
                    </div>

                    <div class="mb-4">
                        <label for="images" class="form-label">Images de l'objet</label>
                        <input type="file" class="form-control form-control" name="images[]" id="images" 
                               multiple accept="image/jpeg, image/png" required>
                        <div class="form-text mt-3">La première image sera utilisée comme image principale.</div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-4 p-2">Ajouter l'objet</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>