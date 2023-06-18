<!DOCTYPE html>
<html>
<head>
  <title>personnes recherche</title>
</head>
<body>
<?php

class recherche_festivalierDAO {
    private $pdo;

    public function __construct($servername, $username, $password, $database) {
        try {
            $this->pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }

    public function getlogin($user) {
        try {
            $stmt = $this->pdo->prepare("SELECT nom, prenom FROM festivalier WHERE date_arriver = :user ");
            $stmt->bindParam(':user', $user);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur lors de la récupération des annonces : " . $e->getMessage();
            return [];
        }
    }
}

// Reste du code HTML
?>
</body>
</html>
