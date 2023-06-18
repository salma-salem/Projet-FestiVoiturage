<!DOCTYPE html>
<html>

<head>
    <title>recherche location controlleur</title>
</head>

<body>
    <?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "site";

    require_once "../modele/recherche_locationDAO.php";

    if (isset($_GET['location']) and isset($_GET['date']) and isset($_GET['festival'])) {

        $location = $_GET['location'];
        $date = $_GET['date'];
        $festival = $_GET['festival']; // Récupération de la valeur de 'location'
    

            try {
                $model = new recherche_locationDAO($servername, $username, $password, $database);
                $festivalier = $model->searchAnnonces($location,$date, $festival); // Utilisation de la date directement
    
                if (!empty($festivalier)) {
                    // Affichage du tableau
                    echo "<table>";

                    // En-têtes de colonne
                    echo "<tr>";
                    $columns = array_keys($festivalier[0]);
                    foreach ($columns as $column) {
                        echo "<th>$column</th>";
                    }
                    echo "</tr>";

                    // Parcours des résultats
                    foreach ($festivalier as $festivalierItem) {
                        echo "<tr>";
                        foreach ($columns as $column) {
                            echo "<td>" . $festivalierItem[$column] . "</td>";
                        }
                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo "Aucun festivalier ne va a cette endroit :(";
                }
            } catch (PDOException $e) {
                echo "Erreur de connexion à la base de données : " . $e->getMessage();
            }
    } else {

        echo "nope";
    }
    
    ?>


</body>

</html>
