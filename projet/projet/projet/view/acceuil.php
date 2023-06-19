<!DOCTYPE html>
<html>
<head>
<title>Festi'Voiture</title>
<link href="../css/acceuil.css" rel="stylesheet">
</head>

<body>

<?php
session_start();

// Vérifier si un message est stocké dans la variable de session
if (isset($_SESSION['message'])) {
    // Afficher le message à l'utilisateur
    echo $_SESSION['message'].'<br>';

    // Supprimer le message de la variable de session pour éviter de l'afficher à nouveau
    unset($_SESSION['message']);
}
?>
<h1>Barbie in Festi'Voiture</h1>

<p>Que souhaitez-vous faire ?</p>

<a href="../controller/annonces.php">Chercher un trajet</a> <br>

<a href="../controller/personnes.php">Chercher un festivalier cherchant une voiture</a><br>

<a href="../controller/User_controller.php">Modifier mon profil</a> </br>

<a href="../controller/festival.php"> Voir la liste des festivals</a>
</body>
</html>
