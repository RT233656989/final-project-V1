<?php

require("../inc/connection.php");
include("../inc/fonction.php");
include("header/header.php");
$list_obj = getObjCat($_POST['cat']);

?>

<!DOCTYPE html>
<html lang="en">


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
        <section class="container my-5">
            <h3 class="text-center">Resultat de la recherche pour categorie : <?php echo $list_obj[0]['nom_categorie']; ?> </h3>
            <?php for ($i = 0; $i < count($list_obj); $i++) { ?>
                <div class="container my-4 w-50">
                    <div class="fb-post card shadow-sm rounded-4 p-3 border-0">
                        <div class="d-flex align-items-center mb-3">
                            <div>
                                <h6 class="mb-0 fw-bold">
                                    <h6><?php echo $list_obj[$i]['proprietaire_nom']; ?> - <a href="fiche.php?objet=<?php echo $list_obj[$i]['id_objet']; ?>">
                                            <?php echo $list_obj[$i]['nom_objet']; ?></a> </h6>
                                    <small class="text-muted"><?php echo $list_obj[$i]['nom_categorie']; ?> · <i class="bi bi-globe"></i></small>
                            </div>
                        </div>
                        <div class="post-content mb-3">
                            <p>Emprunté à <?php echo $list_obj[$i]['emprunteur_nom']; ?> le <?php echo $list_obj[$i]['date_emprunt']; ?></p>
                            <p><small><?php
                                        $now = date('Y-m-d H:i:s');
                                        $retour = $list_obj[$i]['date_retour'];

                                        if ($retour > $now) {
                                            echo "Déjà retourné le " . date('M j Y', strtotime($retour));
                                        } else {
                                            echo date('M j Y', strtotime($retour));
                                        }
                                        ?></small>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </section>
    </main>
</body>

</html>