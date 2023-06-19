<?php
$servername = "127.0.0.1:3306";
$username = "qgkkqhfn_tmp0whci";
$password = "Grootr00to";
$database = "qgkkqhfn_site";
$port = "3306";

try {
    // Création de la connexion PDO
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$database", $username, $password);
    
    // Gérer les exceptions en cas d'erreur
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // echo "Connexion à la base de données réussie";
} catch(PDOException $e) {
    echo "La connexion à la base de données a échoué : " . $e->getMessage();
}
?>
