<!DOCTYPE html>
<html>
<head>
  <title> Annonces - Contrôleur </title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>

<!-- Barre de recherche -->
<table class="form-group">
    <tr>
        <td>
            localisation <input class="form-control" type="text" id="search-location" value="" placeholder="Rechercher un ou plusieurs utilisateurs"/>
            date <input class="form-control" type="date" id="search-date" value="" placeholder="Rechercher un ou plusieurs utilisateurs"/>
            festival <input class="form-control" type="text" id="search-festival" value="" placeholder="Rechercher un ou plusieurs utilisateurs"/>
        </td>
    </tr>
</table>

<div id="result-search"></div>

<!-- Javascript/Ajax pour la barre de recherche -->
<script>
$(document).ready(function(){
  $('#search-location, #search-date, #search-festival').keyup(function(){
    $('#result-search').html('');
    var location = $('#search-location').val();
    var date = $('#search-date').val();
    var festival = $('#search-festival').val();

    $.ajax({
      type: 'GET',
      url: 'recherche.php',
      data: {
        location: location,
        date: date,
        festival: festival
      },
      success: function(data){
        if(data != ""){
          $('#result-search').append(data);
        }else{
          $('#result-search').html("<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucun utilisateur</div>");
        }
      }
    });
  });
});
</script>

<?php
session_start();

// Information de connexion sécurisée
$servername = "localhost";
$username = "root";
$password = "root";
$database = "site";

require_once "../modele/AnnoncesDAO.php";

try {
    $model = new AnnoncesModel($servername, $username, $password, $database);
    $annonces = $model->getAnnonces();

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
            echo "<tr>";
            foreach ($columns as $column) {
                echo "<td>" . htmlspecialchars($annonce[$column]) . "</td>";
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

<!-- Partie pour ajouter des voitures -->
<a href="../view/acceuil.php"> Accueil </a>
<form action="../view/ajout_voiture.php" method="post">
    <input type="submit" value="Ajouter une voiture" id="keyw" placeholder="Tapez ici" name="login">
</form>

</body>
</html>
