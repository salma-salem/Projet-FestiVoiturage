<!DOCTYPE html>
<html>
<head>
  <title>supprimer annonce modele</title>
</head>
<body>

<?php

class CompteModel
{
    private $pdo;

    //connexion a la base de donner

    public function __construct($servername, $username, $password, $database) {
        try {
            $this->pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }

    //suppression de l'annonce grace a son id

    public function supprimerAnnonce($idCompte)
    {
        $query = "DELETE FROM annonces WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $idCompte);
        
        return $stmt->execute();
    }
}
?>
</body>
</html>