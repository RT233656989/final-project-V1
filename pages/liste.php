<?php
session_start();
require("../inc/connection_itu.php");
include("../inc/fonction.php");
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

<body>
    <main>
        <section class="container my-5">
            <div class="row g-4 justify-content-center text-center">
                <h3>Liste des objets :</h3>
                <table class="table table-hover w-75 tab">
                    <thead>
                        <tr>
                            <th scope="col">objet</th>
                            <th scope="col">categorie</th>
                            <th scope="col">proprietaire</th>
                            <th scope="col">emprunteur</th>
                            <th scope="col">emprunt</th>
                            <th scope="col">date de retour</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($tab != null) {
                            for ($i = 0; $i < count($tab); $i++) { ?>
                                <tr>
                                    <td><?php echo $tab[$i]['nom_objet']; ?></td>
                                    <td><?php echo $tab[$i]['nom_categorie']; ?></td>
                                    <td><?php echo $tab[$i]['proprietaire_nom']; ?></td>
                                    <td><?php echo $tab[$i]['emprunteur_nom']; ?></td>
                                    <td><?php echo $tab[$i]['date_emprunt']; ?></td>
                                    <td>
                                        <?php
                                        $now = date('Y-m-d H:i:s');
                                        if ($tab[$i]['date_retour'] < $now) {
                                            echo "Déjà retourné le " . $tab[$i]['date_retour'];
                                        } else {
                                            echo $tab[$i]['date_retour'];
                                        }
                                        ?>
                                    </td>
                                </tr>
                        <?php }
                        } else { ?>
                            <tr>
                                <td colspan="6">Aucune donnée trouvée</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <a href="login.php">Retour</a>
        </section>
    </main>
</body>

</html>
