<!DOCTYPE html>
<html>
<head>
  <title> Ajout de voiture </title>
  </head>


<body>

<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "Session non active";
    header("Location: connexion.php"); // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

// Le reste du code pour la page 2
echo "Contenu de la page 2";
?>



<form action="../controller/ajout_personne.php" method="post">
  <table>
  <tr>
  <td> login </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name="login"> </td>
  </tr>

  <tr>
  <td> festival </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name ="festivale"> </td>
  </tr>

  <td> prenom </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name ="prenom"> </td>
  </tr>

  <td> date d'aller </td>
  <td> <input  type='date' id='keyw' placeholder='Tapez ici' name ="date_arriver"> </td>
  </tr>

  <td> date de retour (facultatif) </td>
  <td> <input  type='date' id='keyw' placeholder='Tapez ici' name ="date_retour"> </td>
  </tr>

  <td> nom </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name ="nom"> </td>
  </tr>

  <tr>
  <td></td>
  <td> <input class='form-control' class='btn btn-success btn-lg' type='submit'> </td>
  </tr>
  
  </table>
  </form>
</body>
</html>