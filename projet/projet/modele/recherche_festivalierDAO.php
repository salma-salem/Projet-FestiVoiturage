<!DOCTYPE html>
<html>
<head>
  <title>personnes recherche</title>
</head>
<body>
<?php

class recherche_festivalierDAO {
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

    // on recupere les informations des annonces qui corresponde a la bonne date
    public function getlogin($date) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM recherche WHERE date_arriver = :user ");
            $stmt->bindParam(':user', $date);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des festivaliers : " . $e->getMessage();
            return [];
        }
    }
}

?>
</body>
</html>
