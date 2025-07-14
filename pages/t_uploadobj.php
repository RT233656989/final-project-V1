<?php
require('../inc/connection.php');
include('../inc/fonction.php');
session_start();
var_dump($_POST);

$uploadDir = '../assets/uploads/';
$maxSize = 20 * 1024 * 1024; // 20 Mo (corrigé le calcul)
$allowedMimeTypes = ['image/jpeg', 'image/png'];

// Vérifie si des fichiers sont soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['fichier']['name'][0])) {
    $files = $_FILES['fichier'];
    $uploadSuccess = true;
    
    // Parcourir tous les fichiers uploadés
    foreach ($files['tmp_name'] as $key => $tmpName) {
        $file = [
            'name' => $files['name'][$key],
            'type' => $files['type'][$key],
            'tmp_name' => $tmpName,
            'error' => $files['error'][$key],
            'size' => $files['size'][$key]
        ];
        
        // Vérifie les erreurs d'upload
        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo 'Erreur lors de l\'upload de ' . $file['name'] . ' : ' . $file['error'] . '<br>';
            $uploadSuccess = false;
            continue;
        }
        
        // Vérifie la taille
        if ($file['size'] > $maxSize) {
            echo 'Le fichier ' . $file['name'] . ' est trop volumineux.<br>';
            $uploadSuccess = false;
            continue;
        }
        
        // Vérifie le type MIME avec finfo
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);
        
        if (!in_array($mime, $allowedMimeTypes)) {
            echo 'Type de fichier non autorisé pour ' . $file['name'] . ' : ' . $mime . '<br>';
            $uploadSuccess = false;
            continue;
        }
        
        // Renomme le fichier
        $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = $originalName . '_' . uniqid() . '.' . $extension;
        
        // Déplace le fichier
        if (move_uploaded_file($file['tmp_name'], $uploadDir . $newName)) {
            echo "Succès pour " . $file['name'] . "</br>";
            $lalana = $uploadDir . $newName;
            echo "Nom du fichier: ".$newName." et extension: ".$extension;
            echo "</br>";
            echo "Lalana: ".$lalana;
            echo "</br>";
            
            //add_image($_SESSION['current_id'], $lalana);
            
        } else {
            echo "Échec du déplacement du fichier " . $file['name'] . ".<br>";
            $uploadSuccess = false;
        }
    }
    
    // Redirection seulement si tous les uploads ont réussi
    if ($uploadSuccess) {
        header('Location: liste.php');
        exit;
    }
    
} else {
    echo "Aucun fichier reçu ou erreur dans le formulaire.";
}
?>