<!DOCTYPE html>
<html>
<head>
  <title> modification mot de passe controlleur </title>
</head>


<body>
<?php

// Pour afficher les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$login = $_SESSION['username'];

// Inclure le fichier du modèle
require_once '../modele/modifmdpDAO.php';

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$database = "site";

// Instancier le modèle avec la connexion PDO
$utilisateurModel = new ModifmdpDAO($servername, $username, $password, $database);

// Vérifier le formulaire soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire en utilisant htmlspecialchars pour éviter les failles XSS
    $oldmdp = htmlspecialchars($_POST['oldmdp']);
    $newmdp = htmlspecialchars($_POST['newmdp']);

    // Appeler la méthode du modèle pour modifier le mot de passe
    $utilisateurModel->modifierMotDePasse($newmdp, $_SESSION['username'], $oldmdp);
}

// Redirection vers une autre page après la modification
exit();
?>