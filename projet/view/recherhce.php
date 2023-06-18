<!DOCTYPE html>
<html>
<head>
  <title> Annonces controlleur </title>
</head>


<body>


<form id="searchForm" method="post" action="">
        <input type="int" name="criteria" id="criteria" placeholder="Nombre de place disponible">
        <input type="submit" value="Rechercher">
    </form>
    <div id="annonces">
        <?php foreach ($annonces as $annonce): ?>
            <div>
                <h2><?php echo $annonce['titre']; ?></h2>
                <p><?php echo $annonce['description']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <script>
    $(document).ready(function() {
      $('#searchForm').submit(function(event) {
        event.preventDefault();
        var criteria = $('#criteria').val();

        $.ajax({
          url: '../controller/recherhe.php', // URL du script PHP pour récupérer les annonces
          method: 'post',
          data: { criteria: criteria },
          success: function(response) {
            $('#results').html(response);
          },
          error: function(xhr, status, error) {
            console.error(error);
          }
        });
      });
    });
  </script>





</body>
</html>
