<!DOCTYPE html>
<html>
<head>
  <title>Supprimer le compte</title>
</head>

<body>

<?php
session_start();
?>

<form action="../controller/supp.php" method="post">
  <table>
    <tr>
      <td>Si vous êtes sûr, cliquez sur le bouton ci-dessous. Sinon, cliquez sur Accueil.
        Sachez que vos annonces ne seront pas supprimées.
      </td>
      <td><input type="submit" name="supp" value="Supprimer"></td>
    </tr>
  </table>
</form>

<a href="../view/acceuil.php">Accueil</a> 

</body>
</html>
