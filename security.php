<?php 

session_start();


if($_POST["identifiant"] == "" || $_POST["pass"] == "") {
    header('location: formulaire.php');
    exit;
}

$bo_log = "toto";
$bo_mdp = "test";

if ($_POST['identifiant'] ==  $bo_log && $_POST['pass'] ==  $bo_mdp) {
    echo "ok";
} else {
    header('location: formulaire.php?erreur=1');
    exit;
}