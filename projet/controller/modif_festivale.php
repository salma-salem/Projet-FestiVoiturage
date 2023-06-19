<!DOCTYPE html>
<html>
<head>
  <title> modification gestivale controlleur </title>
</head>


<?php

// Pour afficher les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

session_start();
$login = $_SESSION['username'];

// Inclure le fichier du modèle
require_once '../modele/modif_festival.php';

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$database = "site";

// Instancier le modèle avec la connexion PDO
$utilisateurModel = new ModifestivalDAO($servername, $username, $password, $database);

// Vérifier le formulaire soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire en utilisant htmlspecialchars pour éviter les failles XSS
    $annonceId = $_SESSION['annonce'];
    $localisation = htmlspecialchars($_POST['localisation']);
    $nom = htmlspecialchars($_POST['festivale']);
    $datedebut = htmlspecialchars($_POST['datedebut']);
    $datefin = htmlspecialchars($_POST['datefin']);
    $login = $_SESSION('username');

    
    // Modifier les champs de la recherche selon les données fournies
    if (!empty($localisation)) {
        $utilisateurModel->modifierloca($localisation, $annonceId);
    }
    if (!empty($datefin)) {
        $utilisateurModel->modifierdatefin($datefin, $annonceId);
    }
    if (!empty($datedebut)) {
        $utilisateurModel->modifierdatedeb($datedebut, $annonceId);
    }
    if (!empty($nom)) {
        $utilisateurModel->modifiernom($nom, $annonceId);
    }

    unset($_SESSION['annonce']);

    // Rediriger vers la page d'accueil après la modification de la recherche
    header('Location: ../view/acceuil.php');
} else {
    echo "pas de id";
}

// Redirection vers une autre page après la modification
exit();
?>
