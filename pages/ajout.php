<?php
require("../inc/connection.php");
include("../inc/fonction.php");
$liste_cat = get_cat();
$liste_membre = get_all_member();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TP</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>

<body class="bg-light">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card mt-5 rounded-4 border-0 w-50">
                <form class="card-body p-5" action="t_inscription.php" method="post">

                    <div class="alert alert-primary text-center text-dark" role="alert">
                        Ajouter un Objet dans la liste
                    </div>


                    <div class="mb-3 text-center text-secondary">
                        <small>Veuillez saisir vos informations pour continuer</small>
                    </div>

                    <label for="nom" class="form-label">Categorie</label>
                    <select name="cat" class="form-select mt-3" aria-label="Default select example">
                                <?php for ($i = 0; $i < count($liste_cat); $i++) { ?>
                                    <option value="<?php echo $liste_cat[$i]['id_categorie'] ?>">
                                        <?php echo $liste_cat[$i]['nom_categorie'] ?>
                                    </option>
                                <?php } ?>
                        </select>

                        <label for="nom" class="form-label">Membre</label>
                    <select name="membre" class="form-select mt-3" aria-label="Default select example">
                                <?php for ($i = 0; $i < count($liste_membre); $i++) { ?>
                                    <option value="<?php echo $liste_membre[$i]['id_membre'] ?>">
                                        <?php echo $liste_membre[$i]['nom'] ?>
                                    </option>
                                <?php } ?>
                    </select>

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom objet</label>
                        <input type="text" id="nom" class="form-control bg-body-secondary bg-opacity-25" name="nom"
                            pattern="^(?=[a-zA-Z0-9._]{4,20}$)(?!.*[_.]{2})[^_.].*[^_.]$" required>
                    </div>

                    <label for="nom" class="form-label">image objet</label>

                    <div class="mb-4">
                        <label for="images">Sélectionnez plusieurs images :</label>
                        <input type="file"class="form-control form-control-lg"  name="images[]" id="images" multiple accept="image/*">
                        <div class="form-text">Formats acceptés: jpg, png. Max 5MB.</div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-4 p-2">Connexion</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>