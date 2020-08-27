<?php

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

?>