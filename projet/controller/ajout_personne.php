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

require_once '../modele/ajoutpersonneDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$login = $_POST['login'];
$prenom = $_POST['prenom'];
$festivale =$_POST['festivale'];

$date_arriver=$_POST['date_arriver'];


$servername = "localhost";
$username = "root";
$password = "root";
$database = "site";

$ajoutpersonneDAO = new ajoutpersonneDAO($servername, $username, $password, $database);

if ($ajoutpersonneDAO->ajouterUtilisateur($login, $nom, $prenom,$date_arriver,$festivale)) {
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