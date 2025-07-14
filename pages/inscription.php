<!-- Page d'inscription -->

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
                <form class="card-body p-5" action="#" method="post">
                    <?php if (isset($_GET["error"])) { ?>
                        <div class="alert alert-danger text-center text-dark" role="alert">
                            Erreur de l'inscription
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-primary text-center text-dark" role="alert">
                            Bienvenue
                        </div>
                    <?php } ?>

                    <div class="mb-3 text-center text-secondary">
                        <small>Veuillez saisir vos informations pour continuer</small>
                    </div>

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom d'utilisateur</label>
                        <input type="text" id="nom" class="form-control bg-body-secondary bg-opacity-25" name="nom" pattern="^(?=[a-zA-Z0-9._]{4,20}$)(?!.*[_.]{2})[^_.].*[^_.]$" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse Email</label>
                        <input type="email" id="email" class="form-control bg-body-secondary bg-opacity-25" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" id="password" class="form-control bg-body-secondary bg-opacity-25" name="password" required>
                    </div>

                    <div class="mb-3">
                        <label for="ville" class="form-label">Ville</label>
                        <input type="text" id="ville" class="form-control bg-body-secondary bg-opacity-25" name="ville" pattern="^(?=[a-zA-Z0-9._]{4,20}$)(?!.*[_.]{2})[^_.].*[^_.]$" required>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date de naissance</label>
                        <input type="date" id="date" class="form-control bg-body-secondary bg-opacity-25" name="date" required>
                    </div>

                    <!-- Champ radio pour le genre -->
                    <div class="mb-3">
                        <label class="form-label d-block">Genre</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="genre" id="homme" value="homme" required>
                            <label class="form-check-label" for="homme">Homme</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="genre" id="femme" value="femme">
                            <label class="form-check-label" for="femme">Femme</label>
                        </div>
                        
                    </div>

                    <div class="p-2 fs-6 text-secondary text-center">
                        <small>Vous avez déjà un compte ?
                            <a class="icon-link icon-link-hover" style="--bs-link-hover-color-rgb: 25, 135, 84;" href="login.php">
                                Se connecter
                            </a>
                        </small>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-4 p-2">Connexion</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
