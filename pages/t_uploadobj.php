<?php
require('../inc/connection.php');
include('../inc/fonction.php');
session_start();

$uploadDir = '../assets/Images/';
$maxSize = 20 * 1024 * 1024; // 20 Mo
$allowedMimeTypes = ['image/jpeg', 'image/png'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier les champs POST requis
    if (empty($_POST['nom']) || empty($_POST['cat'])) {
        die('Tous les champs sont obligatoires.');
    }

    // Vérifier si des fichiers ont été uploadés
    if (empty($_FILES['images']['name'][0])) {
        die('Au moins une image est requise.');
    }

    // Traitement de la première image (image principale)
    $mainImagePath = null;
    $firstImage = [
        'name' => $_FILES['images']['name'][0],
        'type' => $_FILES['images']['type'][0],
        'tmp_name' => $_FILES['images']['tmp_name'][0],
        'error' => $_FILES['images']['error'][0],
        'size' => $_FILES['images']['size'][0]
    ];

    // Uploader l'image principale
    $mainImagePath = upload_image($firstImage);
    
    if (!$mainImagePath) {
        die("Erreur lors de l'upload de l'image principale.");
    }

    // Ajouter l'objet avec l'image principale
    $nom_objet = $_POST['nom'];
    $id_categorie = $_POST['cat'];
    $id_membre = $_SESSION['current_id'];
    
    $id_objet = add_objet($nom_objet, $id_categorie, $id_membre, $mainImagePath);

    if ($id_objet) {
        // Traitement des images supplémentaires (s'il y en a)
        $totalFiles = count($_FILES['images']['name']);
        for ($i = 1; $i < $totalFiles; $i++) {
            $extraImage = [
                'name' => $_FILES['images']['name'][$i],
                'type' => $_FILES['images']['type'][$i],
                'tmp_name' => $_FILES['images']['tmp_name'][$i],
                'error' => $_FILES['images']['error'][$i],
                'size' => $_FILES['images']['size'][$i]
            ];
            
            $extraImagePath = upload_image($extraImage);
            if ($extraImagePath) {
                // Ajouter l'image supplémentaire
                $sql = "INSERT INTO final_project_images_objet (id_objet, nom_image) 
                        VALUES ('$id_objet', '$extraImagePath')";
                mysqli_query(dbconnect(), $sql);
            }
        }
        
        // Redirection
        header('Location: liste.php');
        exit;
    } else {
        die("Erreur lors de l'ajout de l'objet.");
    }
} else {
    die('Méthode non autorisée.');
}
?>
