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
        if($data['date_retour'] < date('%b %e %Y')){
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
    $tab = [];
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



