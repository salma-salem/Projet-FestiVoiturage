<!DOCTYPE html>
<html>
<head>
  <title> Supprimer recherche de vehicule controlleur </title>
</head>


<body>


<?php
// Pour afficher les erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$annonceId = $_SESSION['annonce'];
require_once '../modele/supprecherche.php';

    //connexion a la base de donnee
$servername = "localhost";
$username = "root";
$password = "root";
$database = "site";
$compteModel = new CompteModel($servername, $username, $password, $database);

if ($compteModel->supprimerRecherche($annonceId)) {
    unset($_SESSION['annonce']);
    // Suppression réussie, rediriger vers une autre page
    header("Location: ../view/acceuil.php");
} else {
    // Suppression échouée, afficher un message d'erreur
    echo "La suppression de la recherche a échoué.";
}

?>

</body>
</html>
