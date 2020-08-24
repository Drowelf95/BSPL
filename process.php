<?php 

session_start();


if($_POST["identifiant"] == "" || $_POST["pass"] == "") {
    header('location: formulaire.php');
    exit;
}

$host_name = 'db5000822621.hosting-data.io';
$database = 'dbs728662';
$user_name = 'dbu673427';
$password = 'Ple@seG1veM3in#1412';
$dbh = null;

try {
  $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
} catch (PDOException $e) {
  echo "Erreur!: " . $e->getMessage() . "<br/>";
  die();
}

$response = $dbh ->query('SELECT * FROM login_table');
while ($donnees = $response->fetch())
{
    $bo_log = $donnees['login'];
    $bo_mdp = $donnees['pass'];
}



if ($_POST['identifiant'] ==  $bo_log && $_POST['pass'] ==  $bo_mdp) {
    header('location: backoffice.php');
    exit;
} else {
    header('location: formulaire.php?erreur=1');
    exit;
}