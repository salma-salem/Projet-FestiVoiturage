<!DOCTYPE html>
<html>
<head>
<title>Ajout de festival</title>
<link href="../css/usercon.css" rel="stylesheet">
</head>

<body>

<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$database = "site";

// Vérifier si la session est active
if (!isset($_SESSION['username'])) {
    echo "Session non active";
    header("Location: connexion.php"); // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

require_once '../modele/ajoutfestivalDAO.php';

$ajoutfestivalDAO = new ajoutfestivalDAO($servername, $username, $password, $database);

$login=$_SESSION['username'];

if ($ajoutfestivalDAO->verifierAdmin($login)==false) {
    echo "Action reserver au admin";
    '<a href="../view/acceuil.php">Accueil</a>';
} 
    else{echo "<a href='../view/acceuil.php'>Accueil</a>";

        echo "<form action='../controller/ajout_festival.php' method='post' enctype='multipart/form-data'>";
        echo "<table>";
       
        echo "<tr>";
        echo "<td>nom</td>";
        echo "<td><input type='text' id='keyw1' placeholder='Tapez ici' name='nom'></td>";
        echo "</tr>";
       
        echo "<tr>";
        echo "<td>date de debut</td>";
        echo "<td><input type='date' id='keyw2' placeholder='Tapez ici' name='date_debut'></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>date de fin</td>";
        echo "<td><input type='date' id='keyw2' placeholder='Tapez ici' name='date_fin'></td>";
        echo "</tr>";
       
        echo "<tr>";
        echo "<td>localisation</td>";
        echo "<td><input type='text' id='keyw3' placeholder='Tapez ici' name='localisation'></td>";
        echo "</tr>";
       
        echo "<tr>";
        echo "<td>Image</td>";
        echo "<td><input type='file' id='keyw3' placeholder='Tapez ici' name='pic'></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td></td>";
        echo "<td><input class='form-control' class='btn btn-success btn-lg' type='submit'></td>";
        echo "</tr>";
       
        echo "</table>";
        echo "</form>";
       }

// Le reste du code pour la page 2
?>

<!-- <a href="../view/acceuil.php">Accueil</a>


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
  </form> -->
</body>
</html>
