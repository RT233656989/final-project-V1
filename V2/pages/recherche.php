<?php
require("../inc/connection.php");
include("../inc/fonction.php");
$liste_cat = get_cat();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorie recherche</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
    
<body class="bg-light">
    <main>
        <section class="container">
            <div class="d-flex justify-content-center">
                <div class="card mt-5 rounded-4 border-0 w-50">
                    <form class="card-body p-5" action="resultat.php" method="post">
                        
                        <div class="mb-3">
                            <div id="Help" class="form-text p-0 fs-6 text-secondary text-center">
                                <small>Veuillez selectionner la Categorie à rechercher</small>
                            </div>

                            <select name="cat" class="form-select mt-3" aria-label="Default select example">
                                <?php for ($i = 0; $i < count($liste_cat); $i++) { ?>
                                    <option value="<?php echo $liste_cat[$i]['id_categorie'] ?>">
                                        <?php echo $liste_cat[$i]['nom_categorie'] ?>
                                    </option>
                                <?php } ?>
                            </select>

                            <!-- <input type="text" class="form-control mt-4" name="dep" placeholder="Nom du departement"> -->
                        </div>

                        
                        <button type="submit" class="btn btn-primary w-100 mt-4 p-2">Rechercher</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>

</html>