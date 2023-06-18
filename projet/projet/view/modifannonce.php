<!DOCTYPE html>
<html>
<head>
<title>Modification d'une annonce</title>
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

$_SESSION['annonce'] = $_GET['id']; // Stocker l'ID de l'annonce dans la variable de session

?>

<a href=../view/acceuil.php> Accueil </a>

<table>

<form action="../controller/modif_annonce.php" method="post">
  <table>
  <tr>
  <td> Localisation </td>
  <td> <input type='text' placeholder='Tapez ici' name="localisation"> </td>
  </tr>
  <tr>
  <td> Festival </td>
  <td> <input type='text' placeholder='Tapez ici' name ="festivale"> </td>
  </tr>
  <tr>
  <td> Date </td>
  <td> <input type='text' placeholder='Tapez ici' name ="date"> </td>
  </tr>
  <tr>
  <td> Disponibilité </td>
  <td> <input type='number' placeholder='Tapez ici' name ="dispo"> </td>
  </tr>

  <tr>
  <td></td>
  <td> <input class='form-control' class='btn btn-success btn-lg' type='submit'> </td>
  </tr>
  </table>
  </form>

  <form action="suppannonce.php">
    <input type="submit" name="supp" value="Supprimer l'annonce">
  </form>


</body>
</html>
