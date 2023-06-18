<!DOCTYPE html>
<html>
<head>
  <title> Inscription  </title>
</head>


<body>
<form action="../controller/inscription.php" method="post">
  <table>
  <tr>
  <td> Login </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name="login"> </td>
  </tr>
  <tr>
  <td> Mot de passe </td>
  <td> <input  type='password' id='keyw' placeholder='Tapez ici' name ="mdp"> </td>
  </tr>
  <td> nom </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name ="nom"> </td>
  </tr>
  <td> prenom </td>
  <td> <input  type='text' id='keyw' placeholder='Tapez ici' name ="prenom"> </td>
  </tr>

  </tr>
  <td> Date d'arrivee' </td>
  <td> <input  type='date' id='keyw' placeholder='Tapez ici' name ="date_arriver"> </td>
  </tr>

  

  <tr>
  <td></td>
  <td> <input class='form-control' class='btn btn-success btn-lg' type='submit'> </td>
  </tr>
  
  </table>
  </form>

</body>
</html>