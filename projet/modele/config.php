<!DOCTYPE html>
<html>
<head>
  <title> config modele </title>
</head>

<body>
<?php
 
$servername = "localhost";
$username = "qgkkqhfn_root";
$password = "Grootr00to";
$database = "qgkkqhfn_site";

//connexion a la base de donnée
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit();
}
?>
</body>
</html>
