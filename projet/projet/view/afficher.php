<!DOCTYPE html>
<html>
<head>
<title>Annonce utilisateur</title>
</head>

<body>
<a href="../view/acceuil.php">Accueil</a>


<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$database = "site";

require_once "../modele/mesannonces.php";

// Vérifiez si la session est active


// Le reste du code pour afficher les annonces



try {
    $login = $_SESSION['username'];
    $model = new mesannonces($servername, $username, $password, $database);
    $annonces = $model->searchAnnonces($login);

    echo "Vos propositions de voiture </br>";

    if (!empty($annonces)) {
        // Affichage du tableau
        echo "<table>";

        // En-têtes de colonne
        echo "<tr>";
        $columns = array_keys($annonces[0]);
        foreach ($columns as $column) {
            echo "<th>$column</th>";
        }
        echo "</tr>";

        // Parcours des résultats
        foreach ($annonces as $annonce) {
            echo "<tr>";
            foreach ($columns as $column) {
                echo "<td>" . $annonce[$column] . "</td>";
            }
            echo "<td><a href='../view/modifannonce.php?id=" . $annonce['id'] . "'>Modifier</a></td>"; // Lien de modification;
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "La table est vide.";
    }


    echo "Vos recherches de voiture </br>";
    $recherche = $model->searchrecherche($login);

    if (!empty($recherche)) {
        // Affichage du tableau
        echo "<table>";

        // En-têtes de colonne
        echo "<tr>";
        $columns = array_keys($recherche[0]);
        foreach ($columns as $column) {
            echo "<th>$column</th>";
        }
        echo "</tr>";

        // Parcours des résultats
        foreach ($recherche as $recherche) {
            echo "<tr>";
            foreach ($columns as $column) {
                echo "<td>" . $recherche[$column] . "</td>";
            }
            echo "<td><a href='modifrecherche.php?id=" . $recherche['id'] . "'>Modifier</a></td>"; // Lien de modification
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
</body>
</html>
