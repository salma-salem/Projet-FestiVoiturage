<!DOCTYPE html>
<html>
<head>
  <title> Connexion </title>
  <link href="../css/connexion.css" rel="stylesheet">
</head>


<body>

<?php
session_start();

// Vérifier si un message est stocké dans la variable de session
if (isset($_SESSION['message'])) {
    // Afficher le message à l'utilisateur
    echo $_SESSION['message'].'<br>';

    // Supprimer le message de la variable de session pour éviter de l'afficher à nouveau
    unset($_SESSION['message']);
}
?>

<!-- Formulaire de connexion  -->


    <!-- <form class="register-form" action="../controller/connexion.php" method="post"> -->
    

    <div class="login-page">
  <div class="form">
    <form class="login-form "action="../controller/connexion.php" method="post">
      <input type="text" placeholder="login" name="login"/>
      <input type="password" placeholder="mot de passe" name="mdp"/>
      <button>login</button>
      <p class="message">Sinon cliquez ici <a href="inscription.php">Créez un compte</a></p>
    </form>
  </div>
</div>


</body>
</html>