<?php 

session_start();

$_SESSION['loggedin'] = "";

if($_POST["identifiant"] == "" || $_POST["pass"] == "") {
    header('location: formulaire.php');
    exit;
}

include ("colink.php");

$response = $dbh ->query('SELECT * FROM login_table');
while ($donnees = $response->fetch())
{
    $bo_log = $donnees['login'];
    $bo_mdp = $donnees['pass'];
}

if ($_POST['identifiant'] ==  $bo_log && $_POST['pass'] ==  $bo_mdp) {
    $_SESSION['loggedin'] = "true";
    header('location: backoffice.php');
    exit;
} else {
    header('location: formulaire.php?erreur=1');
    exit;
}

?>