<?php
require('../inc/connection.php');
include('../inc/fonction.php');
session_start();
var_dump($_POST);

$uploadDir = '../assets/Images';
$maxSize = 20 * 1024 * 1024 * 1024; // 20 Mo 
$allowedMimeTypes = ['image/jpeg', 'image/png'];
// Vérifie si un fichier est soumis

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['fichier'])) {
    $file = $_FILES['fichier'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        die('Erreur lors de l’upload : ' . $file['error']);
    }
    // Vérifie la taille 
    if ($file['size'] > $maxSize) {
        die('Le fichier est trop volumineux.');
    }
    // Vérifie le type MIME avec `finfo` 
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    if (!in_array($mime, $allowedMimeTypes)) {
        die('Type de fichier non autorisé : ' . $mime);
    }
    // renommer le fichier 
    $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $newName = $originalName . '_' . uniqid() . '.' . $extension;
    // Déplace le fichier 
    if (move_uploaded_file($file['tmp_name'], $uploadDir . $newName)) {
        echo "Succes</br>";
        $lalana = $uploadDir . $newName;
        echo "Nom du fichier: ".$newName." et extension: ".$extension;
        echo "</br>";
        echo "Lalana: ".$lalana;
        echo "</br>";
        echo $_SESSION['current_id'];
        add_image($_SESSION['current_id'], $lalana);
        
        header('Location:liste.php');

    } else {
        echo "Échec du déplacement du fichier.";
    }
} else {
    echo "Aucun fichier reçu.";
}
?>