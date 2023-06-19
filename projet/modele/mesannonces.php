<!DOCTYPE html>
<html>
<head>
  <title>annonces modele</title>
</head>
<body>
<?php

class mesannonces {
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

    //recherche des annonces via le login de l'utilisateur

    public function searchAnnonces($id) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM annonces WHERE login = :id ");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des annonces : " . $e->getMessage();
            return [];
        }
    }

    // recherche des requetes via le login de l'utilisateur
    
    public function searchRecherche($id) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM recherche WHERE login = :id ");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des recherches : " . $e->getMessage();
            return [];
        }
    }
}

?>
</body>
</html>
