<?php
session_start();
require("../inc/connection.php");
include("../inc/fonction.php");
include("header/header.php");
$prop = getFicheProp($_GET['prop']);
$obj = getPropObjet($_GET['prop']);
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
    <main>
        <div class="container my-4 w-50">
            <div class="fb-post card shadow-sm rounded-4 p-3 border-0">
                <div class="d-flex align-items-center mb-3">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Avatar" class="rounded-circle me-3"width="50" height="50">
                    <div>
                        <h6 class="mb-0 fw-bold"><a href="prop.php?prop=<?php echo $prop['proprietaire_id']; ?>"><?php echo $prop['proprietaire_nom']; ?></a></h6>
                        <small class="text-muted"><?php echo $prop['nom_objet']; ?> · <i class="bi bi-globe"></i></small>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="text-center">Ses Objets</h3>
        <?php for ($i = 0; $i < count($obj); $i++) { ?>
            <div class="container my-4 w-50">
                <div class="fb-post card shadow-sm rounded-4 p-3 border-0">
                    <div class="d-flex align-items-center mb-3">
                        <div>
                            <h6 class="mb-0 fw-bold">
                                <h6><?php echo $obj[$i]['proprietaire_nom']; ?> - <a href="fiche.php?objet=<?php echo $obj[$i]['id_objet']; ?>">
                                        <?php echo $obj[$i]['nom_objet']; ?></a> </h6>
                                <small class="text-muted"><?php echo $obj[$i]['nom_categorie']; ?> · <i class="bi bi-globe"></i></small>
                        </div>
                    </div>
                    <div class="post-content mb-3">
                        <p>Emprunté à <?php echo $obj[$i]['emprunteur_nom']; ?> le <?php echo $obj[$i]['date_emprunt']; ?></p>
                        <p><small><?php
                                    $now = date('Y-m-d H:i:s');
                                    $retour = $obj[$i]['date_retour'];

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