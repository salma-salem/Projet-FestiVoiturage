<!DOCTYPE html>
<html>
<head>
  <title> Annonces controlleur </title>
  
</head>


<body>


<table class="form-group">
    <tr>
          <td> localisation <input class="form-control" type="text" id="search-location" value="" placeholder="Rechercher un ou plusieurs utilisateurs"/>
        date <input class="form-control" type="date" id="search-date" value="" placeholder="Rechercher un ou plusieurs utilisateurs"/>
    festival <input class="form-control" type="text" id="search-festival" value="" placeholder="Rechercher un ou plusieurs utilisateurs"/> </td>
        </div>
    </tr>
</table>
        <div id="result-search"></div>

  ﻿<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  ﻿<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  ﻿<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  ﻿<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <!-- ﻿<script src="js/bootstrap.min.js"></script> -->


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

$servername = "localhost";
$username = "root";
$password = "root";
$database = "site";

require_once "../modele/AnnoncesDAO.php";

// Vérifiez si la session est active


// Le reste du code pour afficher les annonces



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
        echo "La table est vide.";
    }
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
?>



<form action ="../view/ajout_voiture.php" method="post">

    <input  value ="ajouter une Voiture" type='submit' id='keyw' placeholder='Tapez ici' name="login">
</form> 


<a href=../view/profil.php> Modifier mon profil </a> 
</body>
</html>
