<?php

session_start();

function log_off() 
{
    $_SESSION['loggedin'] = "";
    header('location: index.php');
    exit;
}

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

function get_data()
{
    $dbh = dbConnect();
    $req3 = $dbh ->prepare('UPDATE login_table SET user_login = :new_user, pass = :new_pass WHERE id = 1');
    return $req3;
}

function auto_loggin() 
{
    session_start();
    if ($_SESSION['loggedin'] === "") {
        header('location: index.php?action=formulaire');
        exit;
    }
}

if(isset($_POST['save_profil'])){
    $req3 = get_data();
    $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $req3->execute(array(
        'new_user' => $_POST['pseudo'],
        'new_pass' => $password
     ));
    header('location: index.php?action=backOffice');
}