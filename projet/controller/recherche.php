<!DOCTYPE html>
<html>
<head>
    <title>Recherche location controlleur</title>
    <link href="../css/v1.css" rel="stylesheet">
</head>

<body>
    <?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "site";

    require_once "../modele/recherche_locationDAO.php";

    if (isset($_GET['location']) && isset($_GET['date']) && isset($_GET['festival'])) {
        
        //recuperation des données
        
        $location = $_GET['location'];
        $date = $_GET['date'];
        $festival = $_GET['festival'];

        try {
            $model = new recherche_locationDAO($servername, $username, $password, $database);
            $annonces = $model->searchAnnonces($location, $date, $festival);

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
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "Aucune location disponible pour ce festival à cette date et dans cette localisation.";
            }
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    } else {
        echo "Paramètres de recherche manquants.";
    }
    ?>
</body>

</html>
