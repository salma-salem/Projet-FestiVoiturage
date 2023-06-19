<!DOCTYPE html>
<html>
<head>
  <title> Inscription  </title>
  <link href="../css/v2.css" rel="stylesheet">
</head>


<body>
<form action="../controller/inscription.php" method="post">
  <table>
  <tr>
  <td> Login </td>
  <td> <input  type='text' placeholder='Tapez ici' name="login" required> </td>
  </tr>
  <tr>
  <td> Mot de passe </td>
  <td> <input  type='password'  placeholder='Tapez ici' name ="mdp" required> </td>
  </tr>
  <td> nom </td>
  <td> <input  type='text'  placeholder='Tapez ici' name ="nom" required> </td>
  </tr>
  <td> prenom </td>
  <td> <input  type='text'  placeholder='Tapez ici' name ="prenom" required> </td>
  </tr>

  </tr>
  <td> email </td>
  <td> <input  type='email'  placeholder='Tapez ici' name ="email" required> </td>
  </tr>

  

  <tr>
  <td></td>
  <td> <input class='form-control' class='btn btn-success btn-lg' type='submit'> </td>
  </tr>
  
  </table>
  </form>

</body>
</html>