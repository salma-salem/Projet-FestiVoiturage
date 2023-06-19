<!DOCTYPE html>
<html>
<head>
  <title> Annonces modele </title>
</head>

<body>

<?php

class AnnoncesModel {
    private $pdo;

    //connexion a la base de donnee

    public function __construct($servername, $username, $password, $database) {
        try {
            $this->pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }

    //recuperation de toutes les annonces
    
    public function getAnnonces() {
        try {
            $stmt = $this->pdo->query("SELECT voiture, dispo, date_arriver, date_retour, conducteur, festival, localisation, login FROM annonces");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des annonces : " . $e->getMessage();
            return [];
        }
    }
}

?>
</body>
</html>
