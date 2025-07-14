<?php
require("../inc/connection.php");
include("../inc/fonction.php");

add_user($_POST['nom'],$_POST['email'],$_POST['ville'],$_POST['genre'],$_POST['date'],$_POST['password']);
$verify = verify_log($_POST['email'], $_POST['password']);
if($Membres = mysqli_fetch_assoc($verify)) {
    $_SESSION['current_id'] = $Membres['id_membre'];
    header('Location:i_inscription.php');
}