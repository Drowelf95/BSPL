<?php

function dbConnect()
{
    $host_name = 'db5000822621.hosting-data.io';
    $database = 'dbs728662';
    $user_name = 'dbu673427';
    $password = 'Ple@seG1veM3in#1412';
    $dbh = null;

    try 
    {
        $dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
        return $dbh;
    }
    catch (PDOException $e) 
    {
        
        die('Erreur!: ' . $e->getMessage());
    }
}

function auto_loggin() 
{
    session_start();
    if ($_SESSION['loggedin'] === "true") {
        header('location: index.php?action=backOffice');
        exit;
    }
}

function test_loggin() 
{
    $dbh = dbConnect();
    $response = $dbh ->query('SELECT * FROM login_table');
    while ($donnees = $response->fetch())
    {
        $bo_log = $donnees['user_login'];
        $bo_mdp = $donnees['pass'];
    }

    if (isset($_POST['identifiant']) || isset($_POST['pass'])) 
    {
        if ($_POST['identifiant'] ==  $bo_log && $_POST['pass'] ==  $bo_mdp) {
            session_start();
            $_SESSION['loggedin'] = "true";
            header('location: index.php?action=backOffice');
            exit;
        } else {
            header('location: index.php?action=formulaire&erreur=1');
            exit;
        }
    }
}

function logoff() 
{
    if(isset($_GET['loggin'])) { 
        session_start();
        $_SESSION['loggedin'] = "";
        header('location: index.php?action=formulaire');
        exit;
        }
}
