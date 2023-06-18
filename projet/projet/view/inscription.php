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
  <td> <input  type='text' placeholder='Tapez ici' name="login"> </td>
  </tr>
  <tr>
  <td> Mot de passe </td>
  <td> <input  type='password'  placeholder='Tapez ici' name ="mdp"> </td>
  </tr>
  <td> nom </td>
  <td> <input  type='text'  placeholder='Tapez ici' name ="nom"> </td>
  </tr>
  <td> prenom </td>
  <td> <input  type='text'  placeholder='Tapez ici' name ="prenom"> </td>
  </tr>

  </tr>
  <td> email </td>
  <td> <input  type='text'  placeholder='Tapez ici' name ="email"> </td>
  </tr>

  

  <tr>
  <td></td>
  <td> <input class='form-control' class='btn btn-success btn-lg' type='submit'> </td>
  </tr>
  
  </table>
  </form>

</body>
</html>