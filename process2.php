<?php 

session_start();

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

$requete = $dbh ->prepare('INSERT INTO bills(author, date, chapter, title, content, deleted) VALUES(?, CURDATE(), ?, ?, ?, false)');
$requete ->execute(array($_POST['author'],$_POST['chapter'], $_POST['title'], $_POST['mytextarea'], ));
header('location: backoffice.php');
exit;
?>
