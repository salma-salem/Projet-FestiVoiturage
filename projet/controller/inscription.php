<!DOCTYPE html>
<html>
<head>
  <title> Inscription controlleur </title>
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

require_once '../modele/InscriptionDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$login = $_POST['login'];
$prenom = $_POST['prenom'];
$mdp = $_POST['mdp'];
$date_arriver=$_POST['date_arriver'];


$servername = "localhost";
$username = "root";
$password = "root";
$database = "site";

$InscriptionDAO = new InscriptionDAO($servername, $username, $password, $database);

if ($InscriptionDAO->ajouterUtilisateur($login, $mdp, $nom, $prenom,$date_arriver)) {
    // Connexion réussie, rediriger vers une autre page
    header("Location: ../view/connexion.php");
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