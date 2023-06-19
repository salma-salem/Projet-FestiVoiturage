<!DOCTYPE html>
<html>
<head>
    <link href="../css/v1.css" rel="stylesheet">
  <title> festival - Contrôleur </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>

<?php
session_start();

// Information de connexion sécurisée
$servername = "localhost";
$username = "root";
$password = "root";
$database = "site";

require_once "../modele/FestivalDAO.php";

try {
    $model = new AnnoncesModel($servername, $username, $password, $database);
    $annonces = $model->getfestival();
 
    if (!empty($annonces)) {
        // Affichage du tableau
        echo "<table>";
    
        // En-têtes de colonne
        echo "<tr>";
        $columns = array_keys($annonces[0]);
        foreach ($columns as $column) {
            echo "<th>" . htmlspecialchars($column) . "</th>";
        }
        echo "</tr>";

        // Parcours des résultats
        foreach ($annonces as $annonce) {
            echo "<tr>"; foreach ($columns as $column) {
                if ($column == 'image_data') {
                    echo "<td><img src='data:image/jpeg;base64," . base64_encode($annonce[$column]) . "'></td>";
                } else {
                    echo "<td>" . htmlspecialchars($annonce[$column]) . "</td>";
                }
            }
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "La table est vide.";
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>

<!-- Partie pour ajouter des festivales -->
<a href="../view/acceuil.php"> Accueil </a>
<form action="../view/ajout_festival.php" method="post">
    <input type="submit" value="Ajouter un festival" id="keyw" placeholder="Tapez ici" name="login">
</form>

</body>
</html>
