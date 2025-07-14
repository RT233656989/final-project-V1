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
    <div class="container my-5">
        <form class="upload-form p-4 rounded-4 shadow-sm bg-white mx-auto" action="t_upload.php" enctype="multipart/form-data" method="post">
            <h3 class="mb-4 text-center text-primary">Photo de profil</h3>

            <div class="mb-4">
                <label for="fileUpload" class="form-label fw-bold">Choisir votre photo</label>
                <input class="form-control form-control-lg" type="file" id="fileUpload" name="fichier" required>
                <div class="form-text">Formats acceptés: jpg, png. Max 5MB.</div>
            </div>

            <button type="submit" class="btn btn-primary w-100 fw-bold shadow-sm" style="font-size: 1.1rem;">
                Upload
            </button>
        </form>
    </div>

</body>

</html>