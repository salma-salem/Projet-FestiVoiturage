<!DOCTYPE html>
<html>
<head>
  <title>Supprimer la recherche</title>
  <link href="../css/v2.css" rel="stylesheet">
</head>


<body>

<?php
session_start();
?>

<form action="../controller/supprecherche.php" method="post">
  <table>
    <tr>
      <td>Êtes-vous sûr de vouloir supprimer la recherche ?</td>
      <td><input type="submit" name="supp" value="Supprimer"></td>
    </tr>
  </table>
</form>

<a href="../view/acceuil.php">Accueil</a> 

</body>
</html>
