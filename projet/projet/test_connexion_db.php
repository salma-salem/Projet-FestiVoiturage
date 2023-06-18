<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "site";

try {
    // Création de la connexion PDO
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    
    // Gérer les exceptions en cas d'erreur
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // echo "Connexion à la base de données réussie";
} catch(PDOException $e) {
    echo "La connexion à la base de données a échoué : " . $e->getMessage();
}
?>