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
} else {
  echo 'disconnected';
}
?>

</body>
</html>