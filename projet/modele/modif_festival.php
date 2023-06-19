<!DOCTYPE html>
<html>
<head>
  <title>modification festival modele</title>
</head>
<body>
<?php
class ModifestivalDAO {
    private $pdo;


    // connexion a la base de donnee

    public function __construct($servername, $username, $password, $database) {
        try {
            $this->pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }

    //verifier si admin

    public function verifierAdmin($login) {
        try {
            $sql = "SELECT COUNT(*) FROM administrateur WHERE login = :login";
            $requete = $this->pdo->prepare($sql);
            $requete->bindParam(':login', $login);
            $requete->execute();
            $resultat = $requete->fetchColumn();

            return $resultat > 0;
        } catch(PDOException $e) {
            echo "Erreur lors de la vérification de la connexion : " . $e->getMessage();
            return false;
        }
    }

    // modification du nom

    public function modifiernom($nouveaunom, $userId) {
        $query = "UPDATE festivale SET nom = :nouveaunom WHERE id = :userId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':nouveaunom', $nouveaunom);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }

    // modification de la date de debut

    public function modifierdatedeb($nouvelledatedebut, $userId) {
        $query = "UPDATE festivale SET date_debut = :nouvelledatedebut WHERE id = :userId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':nouvelledatedebut', $nouvelledatedebut);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }

    //modification de la date de fin

    public function modifierdatefin($datefin, $userId) {
        $query = "UPDATE festivale SET date_fin = :datefin WHERE id = :userId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':datefin', $datefin);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }

    //modification de la localisation
    
    public function modifierloca($nouveauloca, $userId) {
        $query = "UPDATE festivale SET localisation = :nouveauloca WHERE id = :userId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':nouveauloca', $nouveauloca);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }


    //modifier image

    public function modifierimage($imageData, $userId) {
    $query = "UPDATE festivale SET pic = :imageData WHERE id = :userId";
    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':imageData', $imageData, PDO::PARAM_LOB);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
}
}
?>
</body>
</html>
