<!DOCTYPE html>
<html>
<head>
  <title> Connexion </title>
</head>


<body>

<!-- Formulaire de connexion  -->



<form action="../controller/connexion.php" method="post">
  <table>
  <tr>
  <td> Login </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name="login"> </td>
  </tr>
  <tr>
  <td> Mot de passe </td>
  <td> <input  type='password' id='keyw' placeholder='Tapez ici' name ="mdp"> </td>
  </tr>
  <tr>
  <td></td>
  <td> <input class='form-control' class='btn btn-success btn-lg' type='submit'> </td>
  </tr>
  
  </table>
  </form>

  
<!-- Bouton pour s'inscrire -->

  <a href ="inscription.php"> <input class='form-control' class='btn btn-success btn-lg' type='submit' value ="Inscription"></a>


</body>
</html>