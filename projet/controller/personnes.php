<!DOCTYPE html>
<html>
<head>
  <title> Annonces controlleur </title>
  <!-- source = https://www.youtube.com/watch?v=_EKDdNemV0k -->
</head>


<body>






<div class="container">
    <div class="row">
      ﻿<div class="col-sm-0 col-md-2 col-lg-3"></div>
      <div class="col-sm-12 col-md-8 col-lg-6">
        <h1 style="text-align: center">Barre de recherche</h1>
        ﻿<div class="form-group">
        <?php
        $currentDate = date("Ymd"); // Obtenir la date actuelle au format 'Ymd'
        echo '<input class="form-control" type="date" id="search-user" value="" placeholder="date d\'aller" min="' . $currentDate . '"/>';
        ?>
                </div>

        <div id="result-search"></div>
      ﻿</div>
    </div>
  </div>
  ﻿<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  ﻿<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  ﻿<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  ﻿<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <!-- ﻿<script src="js/bootstrap.min.js"></script> -->

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
            }else{
              document.getElementById('result-search').innerHTML = "<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucun utilisateur</div>"
            }
          }
        });
      }
    });
  });
</script>

<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$database = "site";

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



<form action ="../view/ajout_personne.php" method="post">

    <input  value ="ajouter un festivalier" type='submit' id='keyw' placeholder='Tapez ici' name="festivalier">
</form> 

</body>
</html>
