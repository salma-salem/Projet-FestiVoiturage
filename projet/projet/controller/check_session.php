<!DOCTYPE html>
<html>
<head>
  <title> Test de connexion </title>
</head>
<body>

<?php
// Vérifiez si une session est active
session_start();

if (isset($_SESSION['username'])) {
  echo 'connected';
  // Déconnexion de l'utilisateur en supprimant la session et le cookie
  setcookie(session_name(), '', time() - 3600, '/');
  session_destroy();
} else {
  echo 'disconnected';
}
?>

</body>
</html>
