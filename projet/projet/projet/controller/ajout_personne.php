<!DOCTYPE html>
<html>
<head>
  <title> ajout de personne controlleur </title>
</head>


<body>

<?php

// Pour afficher les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Debut du code

session_start();
require '../modele/config.php';
require '../modele/UserDAO.php';

$userDAO = new UserDAO($pdo);
$errorMessage = ""; // Initialisation de la variable d'erreur
$log = $_SESSION['username'];
$user = $userDAO->getUserByUsername($log);
require_once '../modele/ajoutpersonneDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// Récupérer les données du formulaire
$login = $_SESSION['username'];
$festivale =htmlspecialchars($_POST['festivale']); // htmlspecialchars permet de prevenir des attaques XSS (vu sur Google)
$date_arriver=htmlspecialchars($_POST['date_arriver']);
$localisation= htmlspecialchars($_POST['localisation']);

// recuperer les informations de l'utilisateur
$email=$user['email'];
$nom=$user['nom'];
$prenom=$user['prenom'];

// information de connexion a la base de donner
$servername = "localhost";
$username = "root";
$password = "root";
$database = "site";

$ajoutpersonneDAO = new ajoutpersonneDAO($servername, $username, $password, $database);


if ($ajoutpersonneDAO->ajouterUtilisateur($login, $nom, $prenom, $localisation, $festivale,$email,$date_arriver)) {
    // Connexion réussie, rediriger vers une autre page
    header("Location: personnes.php");
    // echo "reussi";
} else {
    // Identifiants incorrects, afficher un message d'erreur
    $errorMessage = "Identifiants incorrects";
    echo "nope";
}
}
?>
</body>
</html>