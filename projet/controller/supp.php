<!DOCTYPE html>
<html>
<head>
  <title> supprimer compte controlleur </title>
</head>


<body>

<?php

session_start();
$login = $_SESSION['username'];
require_once '../modele/supp.php';

//connexion a la base de donnee
$servername = "localhost";
$username = "qgkkqhfn_root";
$password = "Grootr00to";
$database = "qgkkqhfn_site";

$compteModel = new CompteModel($servername, $username, $password, $database);

if ($compteModel->supprimerCompte($login)) {
    setcookie(session_name(), '', time() - 3600, '/');
    session_destroy();
    // Suppression réussie, rediriger vers une autre page
    header("Location: ../view/acceuil.php");
} else {
    // Suppression échouée, afficher un message d'erreur
    echo "La suppression du compte a échoué.";
}

?>
</body>
</html>