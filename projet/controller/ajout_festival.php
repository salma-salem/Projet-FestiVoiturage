<!DOCTYPE html>
<html>
<head>
  <title> ajout de festival controlleur </title>
</head>


<body>

<?php

// Pour afficher les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Debut du code

session_start();
$errorMessage = ""; // Initialisation de la variable d'erreur

require_once '../modele/ajoutfestivalDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// Récupérer les données du formulaire

$pic =  $_FILES['pic'];// htmlspecialchars permet de prevenir des attaques XSS (vu sur Google)
$localisation = htmlspecialchars( $_POST['localisation']);
$date_fin =  htmlspecialchars($_POST['date_fin']);
$date_debut =  htmlspecialchars($_POST['date_debut']);
$nom = htmlspecialchars($_POST['nom']);
$login = $_SESSION['username'];

//information pour la connexion a la base de donnee
$servername = "localhost";
$username = "qgkkqhfn_root";
$password = "Grootr00to";
$database = "qgkkqhfn_site";

$ajoutfestivalDAO = new ajoutfestivalDAO($servername, $username, $password, $database);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if ($ajoutfestivalDAO->ajouterFestival($nom, $date_debut, $date_fin, $localisation, $pic,$login)) {
    // Connexion réussie, rediriger vers une autre page
    header("Location: festival.php");
    // echo "reussi";
} else {
    // Identifiants incorrects, afficher un message d'erreur
    $errorMessage = "Identifiants incorrects";
    echo "nope";
}
}
}
?>
</body>
</html>