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
$errorMessage = ""; // Initialisation de la variable d'erreur

require_once '../modele/ajoutvoitureDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// Récupérer les données du formulaire
$conducteur =  htmlspecialchars($_POST['conducteur']); // htmlspecialchars permet de prevenir des attaques XSS (vu sur Google)
$dispo =  htmlspecialchars($_POST['dispo']);
$location = htmlspecialchars( $_POST['location']);
$festival =  htmlspecialchars($_POST['festivale']);
$date_arriver =  htmlspecialchars($_POST['date_arriver']);
$voiture = htmlspecialchars($_POST['voiture']);
$login = $_SESSION['username'];

//information pour la connexion a la base de donnee
$servername = "localhost";
$username = "qgkkqhfn_root";
$password = "Grootr00to";
$database = "qgkkqhfn_site";

$ajoutvoitureDAO = new ajoutvoitureDAO($servername, $username, $password, $database);



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if ($ajoutvoitureDAO->ajouterannonce($conducteur, $festival, $location,$dispo, $date_arriver, $voiture,$login)) {
    // Connexion réussie, rediriger vers une autre page
    header("Location: annonces.php");
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