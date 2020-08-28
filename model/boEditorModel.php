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
    $req = $dbh ->prepare('INSERT INTO bills(author, chapter, title, content, deleted) VALUES(?, ?, ?, ?, false)');
    return $req;
}

if(isset($_POST['save_edit'])){
    $req = get_data();
    $req ->execute(array($_POST['author'],$_POST['chapter'], $_POST['title'], $_POST['mytextarea'], ));
header('location: index.php');
}