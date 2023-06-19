<!DOCTYPE html>
<html>
<head>
  <title> Connexion - Contrôleur </title>
</head>
<body>

<?php
// Pour afficher les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Début du code

session_start();
$errorMessage = ""; // Initialisation de la variable d'erreur

require_once '../modele/ConnexionDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' & isset($_POST['login']) & isset($_POST['mdp'])) {
    // Récupérer les données du formulaire en utilisant htmlspecialchars pour éviter les failles XSS
    $login = htmlspecialchars($_POST['login']);
    $mdp = htmlspecialchars($_POST['mdp']);

    $_SESSION['username'] = $login;

    // Préparation des informations nécessaires à la connexion de la base de données
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "site";

    // Connexion à la base de données
    $ConnexionDAO = new ConnexionDAO($servername, $username, $password, $database);

    if ($ConnexionDAO->verifierConnexion($login, $mdp)) {
        // Connexion réussie, rediriger vers une autre page
        echo "Connexion réussie";
        header('Location: ../view/ajout_voiture.php');
        exit;
    } else {
        // Identifiants incorrects, afficher un message d'erreur
        $_SESSION['message'] = "Identifiants et/ou mot de passe incorrects";
        header('Location: ../view/connexion.php');
    }
} 
?>

</body>
</html>
