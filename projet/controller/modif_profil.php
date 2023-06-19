<!DOCTYPE html>
<html>
<head>
  <title> modification profil controlleur </title>
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
require_once '../modele/modif_profilDAO.php';

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$database = "site";

// Instancier le modèle avec la connexion PDO
$utilisateurModel = new ModifProfilDAO($servername, $username, $password, $database);

// Vérifier le formulaire soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire en utilisant htmlspecialchars pour éviter les failles XSS
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $newlogin = htmlspecialchars($_POST['login']);

    // Modifier les champs du profil selon les données fournies
    if (!empty($email)) {
        $utilisateurModel->modifierEmail($email, $_SESSION['username']);
    }
    if (!empty($nom)) {
        $utilisateurModel->modifierNom($nom, $_SESSION['username']);
    }
    if (!empty($prenom)) {
        $utilisateurModel->modifierPrenom($prenom, $_SESSION['username']);
    }
    if (!empty($newlogin)) {
        $utilisateurModel->modifierLogin($newlogin, $_SESSION['username']);
        $_SESSION['username'] = $newlogin;
    }

    // Rediriger vers la page d'accueil après la modification du profil
    header('Location: ../view/acceuil.php');
}

// Redirection vers une autre page après la modification
exit();
?>