<!DOCTYPE html>
<html>
<head>
  <title> Inscription - Contrôleur </title>
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

require_once '../modele/InscriptionDAO.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire en utilisant htmlspecialchars pour éviter les failles XSS
    $nom = htmlspecialchars($_POST['nom']);
    $login = htmlspecialchars($_POST['login']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $mdp = htmlspecialchars($_POST['mdp']);
    $email = htmlspecialchars($_POST['email']);

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "site";

    $InscriptionDAO = new InscriptionDAO($servername, $username, $password, $database);

    if ($InscriptionDAO->ajouterUtilisateur($login, $mdp, $nom, $prenom, $email)) {
        // Inscription réussie, rediriger vers une autre page
        header("Location: ../view/connexion.php");
        exit;
    } else {
        // Identifiants incorrects, afficher un message d'erreur
        $errorMessage = "Identifiants incorrects";
        echo "Erreur lors de l'inscription";
    }
} 
?>

</body>
</html>
