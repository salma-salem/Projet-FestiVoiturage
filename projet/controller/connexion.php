<!DOCTYPE html>
<html>
<head>
  <title> Connexion controlleur </title>
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

require_once '../modele/ConnexionDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // Récupérer les données du formulaire
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];

    
    $_SESSION['username'] = $login;

    // preparation des informations necessaires a la connexion de la base de donnee
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "site";


    // connexion a la base de donnee

    $ConnexionDAO = new ConnexionDAO($servername, $username, $password, $database);


    
    if ($ConnexionDAO->verifierConnexion($login, $mdp)) {
        // Connexion réussie, rediriger vers une autre page
        echo "Connexion réussie";
        header('Location: ../controller/annonces.php');
        exit;
    } else {
        // Identifiants incorrects, afficher un message d'erreur
        $errorMessage = "Identifiants incorrects";
        echo "nope";
    }
}




?>

</body>
</html>
