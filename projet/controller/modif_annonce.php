<!DOCTYPE html>
<html>
<head>
  <title> modification annonce controlleur </title>
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
require_once '../modele/modifannonce.php';

// Connexion à la base de données
$servername = "localhost";
$username = "qgkkqhfn_root";
$password = "Grootr00to";
$database = "qgkkqhfn_site";

// Instancier le modèle avec la connexion PDO
$utilisateurModel = new ModifannonceDAO($servername, $username, $password, $database);

// Vérifier le formulaire soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire en utilisant htmlspecialchars pour éviter les failles XSS
    $annonceId = $_SESSION['annonce'];

    $localisation = htmlspecialchars($_POST['localisation']);
    $festivale = htmlspecialchars($_POST['festivale']);
    $date = htmlspecialchars($_POST['date']);
    $dispo = htmlspecialchars($_POST['dispo']);

    if (!empty($localisation)) {
        // Modifier la localisation de l'annonce
        $utilisateurModel->modifierloca($localisation, $annonceId);
    }
    if (!empty($festivale)) {
        // Modifier le festival de l'annonce
        $utilisateurModel->modifierfesti($festivale, $annonceId);
    }
    if (!empty($date)) {
        // Modifier la date de l'annonce
        $utilisateurModel->modifierdate($date, $annonceId);
    }
    if (!empty($dispo)) {
        // Modifier la disponibilité de l'annonce
        $utilisateurModel->modifierdispo($dispo, $annonceId);
    }

    unset($_SESSION['annonce']);

    // Redirection vers une autre page après la modification
    header('Location: ../view/acceuil.php');
    exit;
} else {
    echo "Pas d'ID d'annonce spécifié.";
}
