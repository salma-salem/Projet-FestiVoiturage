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
?>



<form action="" method="post">
  <table>
  <tr>
  <td> Conducteur </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name="conducteur"> </td>
  </tr>

  <tr>
  <td> festival </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name ="festivale"> </td>
  </tr>

  <td> location </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name ="location"> </td>
  </tr>

  <td> place libre </td>
  <td> <input  type='number' id='keyw' placeholder='Tapez ici' name ="prenom"> </td>
  </tr>
  
  <td> date d'aller </td>
  <td> <input  type='date' id='keyw' placeholder='Tapez ici' name ="date_aller"> </td>
  </tr>

  <td> date de retour (facultatif) </td>
  <td> <input  type='date' id='keyw' placeholder='Tapez ici' name ="date_retour"> </td>
  </tr>

  <td> type de voiture </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name ="type_voiture"> </td>
  </tr>

  <tr>
  <td></td>
  <td> <input class='form-control' class='btn btn-success btn-lg' type='submit'> </td>
  </tr>
  
  </table>
  </form>
</body>
</html>