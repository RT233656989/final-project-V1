<?php

function add_user($nom, $email, $ville, $genre, $dtn, $mdp)
{
    $prompt = "INSERT INTO final_project_membre (nom, email, ville, genre, date_naissance, mdp ) 
    VALUES ('%s', '%s', '%s', '%s', '%s', '%s')";
    $sql = sprintf($prompt, $nom, $email, $ville, $genre, $dtn, $mdp);
    $result = mysqli_query(dbconnect(), $sql);
}

function verify_log($email, $mdp)
{
    $prompt = "SELECT * FROM final_project_membre WHERE email='%s' AND mdp='%s'";
    $sql = sprintf($prompt, $email, $mdp);
    $results = mysqli_query(dbconnect(), $sql);

    return $results;
}

function add_image($id, $image)
{
    $prompt = "UPDATE final_project_membre SET image_profil = '%s' WHERE id_membre='%s'";
    $sql = sprintf($prompt, $image, $id);
    echo $sql;
    $result = mysqli_query(dbconnect(), $sql);
}

function get_objets()
{
    $prompt = "SELECT * FROM v_objets_complets";
    $result = mysqli_query(dbconnect(), $prompt);
    $tab = [];

    while ($data = mysqli_fetch_assoc($result)) {
        if ($data['date_retour'] < date('%b %e %Y')) {
            $data['date_retour'] = "rendu";
        }

        $tab[] = $data;
    }
    return $tab;
}

function getObjCat($categorie)
{
    $prompt = "SELECT * FROM v_objets_complets 
    WHERE categorie_id='%s'";
    $sql = sprintf($prompt, $categorie);
    $result = mysqli_query(dbconnect(), $sql);
    $ta = [];
    while ($data = mysqli_fetch_assoc($result)) {
        $tab[] = $data;
    }
    return $tab;
}


function get_cat()
{
    $prompt = "SELECT * FROM final_project_categorie_objet";
    $result = mysqli_query(dbconnect(), $prompt);
    $tab = [];

    while ($data = mysqli_fetch_assoc($result)) {

        $tab[] = $data;
    }
    return $tab;
}

function getFicheObjet($id)
{
    $prompt = "SELECT * FROM v_objets_complets
    WHERE id_objet='%s'";
    $sql = sprintf($prompt, $id);
    $result = mysqli_query(dbconnect(), $sql);

    if ($data = mysqli_fetch_assoc($result)) {
        return $data;
    }
}

function getFicheProp($id)
{
    $prompt = "SELECT * FROM v_objets_complets
    WHERE proprietaire_id='%s'";
    $sql = sprintf($prompt, $id);
    $result = mysqli_query(dbconnect(), $sql);

    if ($data = mysqli_fetch_assoc($result)) {
        return $data;
    }
}

function getPropObjet($id)
{
    $prompt = "SELECT * FROM v_objets_complets 
    WHERE proprietaire_id ='%s'";
    $sql = sprintf($prompt, $id);
    $result = mysqli_query(dbconnect(), $sql);
    $tab = [];
    if ($data = mysqli_fetch_assoc($result)) {
        $tab[] = $data;
    }
    return $tab;
}

function add_objet($nom_objet, $id_categorie, $id_membre, $image_path)
{
    $conn = dbconnect();

    // 1. Ajouter l'objet
    $sql_objet = "INSERT INTO final_project_objet (nom_objet, id_categorie, id_membre) 
                  VALUES ('$nom_objet', '$id_categorie', '$id_membre')";
    mysqli_query($conn, $sql_objet);
    $id_objet = mysqli_insert_id($conn);

    // 2. Ajouter l'image principale
    if ($image_path) {
        $sql_image = "INSERT INTO final_project_images_objet (id_objet, nom_image) 
                      VALUES ('$id_objet', '$image_path')";
        mysqli_query($conn, $sql_image);
    }

    return $id_objet;
}

function upload_image($file) {
    $uploadDir = '../assets/Images/';
    $maxSize = 20 * 1024 * 1024; // 20 Mo
    $allowedMimeTypes = ['image/jpeg', 'image/png'];
    
    if ($file['error'] !== UPLOAD_ERR_OK) {
        return false;
    }
    
    // Vérification de la taille
    if ($file['size'] > $maxSize) {
        return false;
    }
    
    // Vérification du type MIME
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    
    if (!in_array($mime, $allowedMimeTypes)) {
        return false;
    }
    
    // Renommer et déplacer le fichier
    $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $newName = $originalName . '_' . uniqid() . '.' . $extension;
    $targetPath = $uploadDir . $newName;
    
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        return $targetPath;
    }
    
    return false;
}