<!DOCTYPE html>
<html>

<head>
    <title>Recherche festivalier controlleur</title>
</head>

<body>
    <?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $database = "site";

    require_once "../modele/recherche_festivalierDAO.php";

    if (isset($_GET['user'])) {
        $user = $_GET['user']; // Récupération de la valeur de 'user'
    
        // Correction : Vérifier si la date est au format 'Y-m-d'
        if (DateTime::createFromFormat('Y-m-d', $user) !== false) {
            try {
                $model = new recherche_festivalierDAO($servername, $username, $password, $database);
                $festivalier = $model->getlogin($user); // Utilisation de la date directement
    
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
                    echo "Ce login ne correspond à aucun festivalier.";
                }
            } catch (PDOException $e) {
                echo "Erreur de connexion à la base de données : " . $e->getMessage();
            }
        } else {
            echo "Format de date invalide. Utilisez le format 'Y-m-d'.";
        }
    }
    ?>

    <form action="../view/ajout_personne.php" method="post">
        <input type="submit" value="Ajouter un festivalier" id="keyw" name="festivalier">
    </form>
</body>

</html>
