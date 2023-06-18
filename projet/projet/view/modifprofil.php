<!DOCTYPE html>
<html>
<head>
<title>Modification du profil</title>
</head>

<body>

<?php
session_start();

require '../modele/config.php';
require '../modele/UserDAO.php';

// Vérifier si la session est active
if (!isset($_SESSION['username'])) {
    echo "Session non active";
    header("Location: connexion.php"); // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
} 

?>

<table>

<form action="../controller/modif_profil.php" method="post">
  <table>
  <tr>
  <td> Login </td>
  <td> <input type='text' placeholder='Tapez ici' name="login"> </td>
  </tr>
  <tr>
  <td> Nom </td>
  <td> <input type='text' placeholder='Tapez ici' name ="nom"> </td>
  </tr>
  <tr>
  <td> Prénom </td>
  <td> <input type='text' placeholder='Tapez ici' name ="prenom"> </td>
  </tr>
  <tr>
  <td> Email </td>
  <td> <input type='text' placeholder='Tapez ici' name ="email"> </td>
  </tr>

  <tr>
  <td></td>
  <td> <input class='form-control' class='btn btn-success btn-lg' type='submit'> </td>
  </tr>
  
  </table>
  </form>
</body>
</html>
