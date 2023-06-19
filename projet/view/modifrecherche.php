<!DOCTYPE html>
<html>
<head>
<title>Modification de recherche</title>
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

$_SESSION['annonce'] = $_GET['id'];

?>

<table>

<form action="../controller/modif_recherche.php" method="post">
  <table>
  <tr>
  <td> localisation </td>
  <td> <input type='text' placeholder='Tapez ici' name="localisation"> </td>
  </tr>
  <tr>
  <td> festivale </td>
  <td> <input type='text' placeholder='Tapez ici' name ="festivale"> </td>
  </tr>
  <tr>
  <td> date </td>
  <td> <input type='text' placeholder='Tapez ici' name ="date"> </td>
  </tr>

  <tr>
  <td></td>
  <td> <input class='form-control' class='btn btn-success btn-lg' type='submit'> </td>
  </tr>

  </table>
  </form>

  <form action="supprecherche.php">
    <input type="submit" name="supp" value="supprimer recherche">
  </form>
</body>
</html>
