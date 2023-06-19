<!DOCTYPE html>
<html>
<head>
<title>Modification du mot de passe</title>
<link href="../css/v2.css" rel="stylesheet">
</head>

<body>

<?php
session_start();

require '../modele/config.php';
require '../modele/userDAO.php';

// Vérifier si la session est active
if (!isset($_SESSION['username'])) {
    echo "Session non active";
    header("Location: connexion.php"); // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
} 

?>

<table>

<form action="../controller/modif_mdp.php" method="post">
  <table>
  <tr>
  <td> Entrez l'ancien mot de passe </td>
  <td> <input  type='password' placeholder='Tapez ici' name="oldmdp"> </td>
  </tr>
  <tr>
  <td> Entrez le nouveau mot de passe </td>
  <td> <input  type='password'  placeholder='Tapez ici' name="newmdp"> </td>
  </tr>

  <tr>
  <td></td>
  <td> <input class='form-control' class='btn btn-success btn-lg' type='submit'> </td>
  </tr>
  
  </table>
  </form>
</body>
</html>
