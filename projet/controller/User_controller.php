<?php
session_start();

require '../modele/config.php';
require '../modele/UserDAO.php';

$userDAO = new UserDAO($pdo);

if (!isset($_SESSION['username'])) {
    echo "Session non active";
    header("Location:../view/connexion.php");
    exit();
}

$username = $_SESSION['username'];
$user = $userDAO->getUserByUsername($username);

if ($user) {
    echo "login actuel : " . $username .'</br>';
    echo "Nom : " . $user['nom'].  '<a href=profil.php> Modifier mon nom </a>'  .'</br>';
    echo "Prénom : " . $user['prenom'].  '<a href=profil.php> Modifier mon profil </a>'.'</br>';
    echo "etes vous en recherche d'une voiture ? ".  '<a href=profil.php> Modifier mon profil </a>'. $user['prenom'].'</br>';
    echo "A quelle festival participez vous ? ".  '<a href=profil.php> Modifier mon profil </a>'. $user['festivale'].'</br>';
    echo "Date d'arriver ". $user['date_arriver'].  '<a href=profil.php> Modifier mon profil </a>'.'</br>';
    echo "Mot de passe ". $user['mdp'].  '<a href=profil.php> Modifier mon profil </a>'.'</br>';
    // ...
} else {
    echo "Aucune information d'utilisateur trouvée.";
}
?>