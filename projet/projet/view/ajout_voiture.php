<!DOCTYPE html>
<html>
<head>
<title>Ajout de voiture</title>
</head>

<body>

<?php
session_start();

// Vérifier si la session est active
if (!isset($_SESSION['username'])) {
    echo "Session non active";
    header("Location: connexion.php"); // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}
?>

<a href="../view/acceuil.php">Accueil</a>


<form action="../controller/ajout_voiture.php" method="post">
  <table>
  <tr>
  <td> Conducteur </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name="conducteur"> </td>
  </tr>

  <tr>
  <td> festival </td>
  <td> <input  type='text'  placeholder='Tapez ici' name="festivale"> </td>
  </tr>

  <tr>
  <td> location </td>
  <td> <input  type='text'  placeholder='Tapez ici' name="location"> </td>
  </tr>

  <tr>
  <td> place libre </td>
  <td> <input  type='number' placeholder='Tapez ici' name="dispo"> </td>
  </tr>
  
  <tr>
  <td> date d'aller </td>
  <td> <input  type='date' placeholder='Tapez ici' name="date_arriver"> </td>
  </tr>

  <tr>
  <td> type de voiture </td>
  <td> <input  type='text'  placeholder='Tapez ici' name="voiture"> </td>
  </tr>

  <tr>
  <td></td>
  <td> <input class='form-control' class='btn btn-success btn-lg' type='submit'> </td>
  </tr>
  
  </table>
  </form>
</body>
</html>
