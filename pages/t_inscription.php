<?php
require("../inc/connection.php");
include("../inc/fonction.php");



add_user(
    $_POST['nom'],
    $_POST['email'],
    $_POST['ville'],
    $_POST['genre'],
    $_POST['date'],
    $_POST['password']
);
