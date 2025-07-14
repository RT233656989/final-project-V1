<?php
session_start();
require("../inc/connection.php");
include("../inc/fonction.php");
include("header/header.php");
$tab = get_objets();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Objets</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>

<body class="bg-light">

    <main>
        <?php for ($i = 0; $i < count($tab); $i++) { ?>
            <div class="container my-4 w-50">
                <div class="fb-post card shadow-sm rounded-4 p-3 border-0">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-0 fw-bold">
                                <h6><?php echo $tab[$i]['proprietaire_nom']; ?> - <a href="fiche.php?objet=<?php echo $tab[$i]['id_objet']; ?>">
                                    <?php echo $tab[$i]['nom_objet']; ?></a> </h6>
                                <small class="text-muted"><?php echo $tab[$i]['nom_categorie']; ?> · <i class="bi bi-globe"></i></small>
                        </div>
                    </div>
                    <div class="post-content mb-3">
                        <p>Emprunté à <?php echo $tab[$i]['emprunteur_nom']; ?> le <?php echo $tab[$i]['date_emprunt']; ?></p>
                        <p><small><?php
                                    $now = date('Y-m-d H:i:s');
                                    $retour = $tab[$i]['date_retour'];

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
    </main>
</body>

</html>