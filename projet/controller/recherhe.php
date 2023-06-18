<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$database = "site";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

require_once "../modele/crit.php";

$dispo=$_POST['criteria'];

// Vérifiez si la session est active


// Le reste du code pour afficher les annonces
try {
    $model = new critDAO($servername, $username, $password, $database);
    $festivalier = $model->annonce($dispo);

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
        foreach ($festivalier as $festivalier) {
            echo "<tr>";
            foreach ($columns as $column) {
                echo "<td>" . $festivalier[$column] . "</td>";
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
}
?>



<form action ="../view/ajout_personne.php" method="post">

    <input  value ="ajouter un festivalier" type='submit' id='keyw' placeholder='Tapez ici' name="festivalier">
</form> 