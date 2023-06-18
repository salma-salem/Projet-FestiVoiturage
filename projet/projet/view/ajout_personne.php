<!DOCTYPE html>
<html>
<head>
<title>Ajout de personne</title>
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

// Le reste du code pour la page 2
?>

<a href="../view/acceuil.php">Accueil</a>


<form action="../controller/ajout_personne.php" method="post">
  <table>

  <tr>
  <td> festival </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name="festivale"> </td>
  </tr>


  <tr>
  <td> date d'aller </td>
  <td> <input  type='date' id='keyw' placeholder='Tapez ici' name="date_arriver"> </td>
  </tr>

  <tr>
  <td> localisation </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name="localisation"> </td>
  </tr>
  

  <tr>
  <td></td>
  <td> <input class='form-control' class='btn btn-success btn-lg' type='submit'> </td>
  </tr>
  
  </table>
  </form>
</body>
</html>
