<!DOCTYPE html>
<html>
<head>
  <title>personnes modele</title>
</head>
<body>

<?php

class PersonneDAO {
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

    // recupere tous les festivaliers ayant poster une recherche
    public function getFestivalier() {
        try {
            $stmt = $this->pdo->query("SELECT * FROM recherche");
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
