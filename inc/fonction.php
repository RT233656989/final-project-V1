<?php

function add_user($nom, $email, $ville, $genre, $dtn, $mdp)
{
    $prompt = "INSERT INTO final_project_membre (nom, email, ville, genre, date_naissance, mdp ) 
    VALUES ('%s', '%s', '%s', '%s', '%s', '%s')";
    $sql = sprintf($prompt, $nom, $email, $ville, $genre, $dtn, $mdp);
    $result = mysqli_query(dbconnect(), $sql);
}
