<!DOCTYPE html>
<html>
<head>
  <title> supprimer annonce controlleur </title>
</head>


<body>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$annonceId = $_SESSION['annonce'];
require_once '../modele/suppannonce.php';


//connexion a la base de donnee

$servername = "localhost";
$username = "root";
$password = "root";
$database = "site";

$compteModel = new CompteModel($servername, $username, $password, $database);

if ($compteModel->supprimerAnnonce($annonceId)) {
    unset($_SESSION['annonce']);
    // Suppression réussie, rediriger vers une autre page
    header("Location: ../view/acceuil.php");
} else {
    // Suppression échouée, afficher un message d'erreur
    echo "La suppression de l'annonce a échoué.";
}

?>
</body>
</html>