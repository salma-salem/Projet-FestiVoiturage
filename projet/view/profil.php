<!DOCTYPE html>
<html>
<head>
<title>Mon profile</title>

</head>

<body>

<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "Session non active";
    header("Location: connexion.php"); // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
} 
?>


<table>
    <tr>
        <td> Modifier le login </td>
        <td> <form method="POST" action="modifier_login.php">
        <label for="nouveau_login">Nouveau login :</label>
        <input type="text" id="nouveau_login" name="nouveau_login">
        <input type="submit" value="Modifier"></td>
    </tr>
    <tr>
    <td> Modifier le mot de passe </td>
        <td> <form method="POST" action="modifier_mdp.php">
        <label for="nouveau_mdp">Nouveau mdp :</label>
        <input type="text" id="nouveau_mdp" name="nouveau_mdp">
        <input type="submit" value="Modifier"></td>
</tr>
<tr>
    <td> Modifier le nom </td>
        <td> <form method="POST" action="modifier_nom.php">
        <label for="nouveau_nom">Nouveau nom :</label>
        <input type="text" id="nouveau_nom" name="nouveau_nom">
        <input type="submit" value="Modifier"></td>
</tr>
<tr>
    <td> Modifier le prenom </td>
        <td> <form method="POST" action="modifier_prenom.php">
        <label for="nouveau_prenom">Nouveau prenom :</label>
        <input type="text" id="nouveau_prenom" name="nouveau_prenom">
        <input type="submit" value="Modifier"></td>
</tr>
<tr>
    <td> Modifier le festival </td>
        <td> <form method="POST" action="modifier_festival.php">
        <label for="nouveau_festival">Nouveau festival :</label>
        <input type="text" id="nouveau_festival" name="nouveau_festival">
        <input type="submit" value="Modifier"></td>
</tr>
<tr>
    <td> Modifier les dates de présences </td>
        <td> <form method="POST" action="modifier_date.php">
        <label for="nouveau_date">Nouveau prenom :</label>
        <input type="date" id="nouveau_prenom" name="nouveau_prenom">
        <input type="submit" value="Modifier"></td>
</tr>

    </form>
</table>


</body>
</html>
