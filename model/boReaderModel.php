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

function display_active()
{
    $dbh = dbConnect();
    $rep = $dbh ->query('SELECT * FROM bills WHERE deleted=0');
    return $rep;
}