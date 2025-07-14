<?php

require("../inc/connection.php");
include("../inc/fonction.php");
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

<body>
    <main>

        <section class="container my-5">
            <div class="row g-4 justify-content-center text-center">
                <article>

                    <h3>Resultat de la recherche pour categorie : <?php echo $list_obj[0]['nom_categorie']; ?> </h3>

                    <table class="table table-hover w-75">
                        <thead>
                            <tr>
                                <th scope="col">Objet</th>
                            </tr>
                        </thead>
                        <?php if ($list_obj != null) {
                            for ($i = 0; $i < count($list_obj); $i++) { ?>
                                <tr>
                                    <td><?php echo $list_obj[$i]['nom_objet']; ?></td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td>NULL</td>
                                <td>NULL</td>
                            </tr>
                        <?php }
                        ?>
                    </table>

                </article>

            </div>
        </section>

        <a href="liste.php">Retour</a>
    </main>

</body>

</html>