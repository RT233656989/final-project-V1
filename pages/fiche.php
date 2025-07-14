<?php
session_start();
require("../inc/connection.php");
include("../inc/fonction.php");
include("header/header.php");
$obj = getFicheObjet($_GET['objet']);
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
                    <div>
                        <h6 class="mb-0 fw-bold"><a href="prop.php?prop=<?php echo $obj['proprietaire_id']; ?>"><?php echo $obj['proprietaire_nom']; ?></a></h6>
                        <small class="text-muted"><?php echo $obj['nom_objet']; ?> · <i class="bi bi-globe"></i></small>
                    </div>
                </div>
                <div class="post-content mb-3">
                <img src="../assets/Images/<?php echo $obj['nom_image']; ?>" alt="<?php echo $obj['nom_image']; ?>" class="img-fluid rounded-3 mt-2 w-100">
                </div>
            </div>
        </div>
    </main>
</body>

</html>