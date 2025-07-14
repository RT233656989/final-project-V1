<?php
require('../inc/connection.php');
include('../inc/fonction.php');
session_start();
if($_POST['email'] != '' && $_POST['password'] != ''){
    $verify = verify_log($_POST['email'], $_POST['password']);
    if($Membres = mysqli_fetch_assoc($verify)) {
        $_SESSION['current_id'] = $Membres['id_membre'];
        header('Location:liste.php');
    } else {
       header('Location:login.php?error=1');
    }
}
else {
    header('Location:login.php?error=1');
}
?>