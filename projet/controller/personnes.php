<!DOCTYPE html>
<html>
<head>
  <link href="../css/v1.css" rel="stylesheet">
  <title> recherche personne controlleur </title>
  <!-- source = https://www.youtube.com/watch?v=_EKDdNemV0k -->
</head>
<body>

<!-- barre de recherche -->
  <div class="container">
    <div class="row">
      <div class="col-sm-0 col-md-2 col-lg-3"></div>
      <div class="col-sm-12 col-md-8 col-lg-6">
        <div class="form-group">
          <table>
            <tr>
              <td> Rechercher en fonction de la date d'arrivée </td>
              <td>
                <?php
                $currentDate = date("Y-m-d"); // Obtenir la date actuelle au format 'Y-m-d'
                echo '<input class="form-control" type="date" id="search-user" value="" placeholder="Date d\'arrivée" min="' . $currentDate . '"/>';
                ?>
              </td>
            </tr>
          </table>
        </div>

        <div id="result-search"></div>
      </div>
    </div>
  </div>


<!-- lien pour javascrip -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  
  <!-- script pour utiliser ajax -->

  <script>
  $(document).ready(function(){
    $('#search-user').keyup(function(){
      $('#result-search').html('');

      var utilisateur = $(this).val();

      if(utilisateur != ""){
        $.ajax({
          type: 'GET',
          url: 'recherche_festivalier.php',
          data: 'user=' + encodeURIComponent(utilisateur),
          success: function(data){
            if(data != ""){
              $('#result-search').append(data);
            } else{
              document.getElementById('result-search').innerHTML = "<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucun utilisateur</div>"
            }
          }
        });
      }
    });
  });
  </script>


<!-- recuperation de tous les annonces des festivalier -->

<?php
session_start();

$servername = "localhost";
$username = "qgkkqhfn_root";
$password = "Grootr00to";
$database = "qgkkqhfn_site";

require_once "../modele/personnesDAO.php";

// Vérifiez si la session est active

try {
    $model = new PersonneDAO($servername, $username, $password, $database);
    $festivalier = $model->getFestivalier();

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
?>

<form action="../view/ajout_personne.php" method="post">
    <input type="submit" value="Ajouter un festivalier" name="festivalier">
</form> 

<a href="../view/acceuil.php">Accueil</a> 
</body>
</html>
