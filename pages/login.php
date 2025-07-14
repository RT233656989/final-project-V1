<!-- Page de login -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ETU003905</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>

<body class="bg-light">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card mt-5 rounded-4 border-0 w-50">
                <form class="card-body p-5" action="#" method="post"> <!-- action toujours a verifier -->
                    <?php if (isset($_GET["error"])) { ?>
                        <div class="alert alert-danger text-center text-dark" role="alert">
                            Accès refusé
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-primary text-center text-dark" role="alert">
                            Bienvenue
                        </div>
                    <?php } ?>
                    <div class="mb-3">
                        <div id="Help" class="form-text p-0 fs-6 text-secondary text-center">
                            <small>Veuillez saisir vos informations pour ouvrir votre session</small>
                        </div>
                        <input type="email" class="form-control bg-body-secondary bg-opacity-25 mt-4"
                            id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control bg-body-secondary bg-opacity-25"
                            id="exampleInputPassword1" name="password" placeholder="Mot de passe">
                    </div>
                    <div class="p-2 fs-6 text-secondary text-center">
                        <small>Vous n'avez pas de compte ?
                            <a class="icon-link icon-link-hover" style="--bs-link-hover-color-rgb: 25, 135, 84;"
                                href="inscription.php">
                                S'inscrire
                            </a></small>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-4 p-2">Connexion</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>