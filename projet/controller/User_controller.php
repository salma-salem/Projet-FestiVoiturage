<!DOCTYPE html>
<html>
<head>
    <link href="../css/usercon.css" rel="stylesheet">
  <title> Profil controlleur </title>
</head>


<body>



<?php
session_start();

if (isset($_SESSION['message'])) {
    // Afficher le message à l'utilisateur
    echo $_SESSION['message'] . '<br>';

    // Supprimer le message de la variable de session
    unset($_SESSION['message']);
} 

require '../modele/config.php';
require '../modele/userDAO.php';

$userDAO = new UserDAO($pdo);

// verification que la personne est bien connectée
if (!isset($_SESSION['username'])) {
    echo "Session non active";
    header("Location: ../view/connexion.php");
    exit();
}

// recuperation des informations du clients

$username = $_SESSION['username'];
$user = $userDAO->getUserByUsername($username);

if ($user) {
    echo "Login actuel : " . $user['login'] . '<br>';
    echo "Nom : " . $user['nom'] . '<br>';
    echo "Prénom : " . $user['prenom'] . '<br>';
    echo "Email : " . $user['email'] . '<br>';

    echo '<a href="../view/afficher.php">Afficher vos annonces</a><br>
    <a href="../view/modifprofil.php">Modifier profil</a><br>
    <a href="../view/acceuil.php">Accueil</a><br>
    <a href="../view/modif_mdp.php">Modifier mot de passe</a><br>
    <a href="../view/supp.php">Supprimer profil</a>';
} else {
    echo "Aucune information d'utilisateur trouvée.";
    echo "test" . $username;
}
?>
</body>
</html>