<!DOCTYPE html>
<html>
<head>
  <title>modification profil modele</title>
</head>
<body>

<?php

class ModifProfilDAO {
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

    //modification du login

    public function modifierLogin($nouveauLogin, $userId) {
        $query = "UPDATE festivalier SET login = :nouveauLogin WHERE login = :userId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':nouveauLogin', $nouveauLogin);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }

    //modification du nom

    public function modifierNom($nouveauNom, $userId) {
        $query = "UPDATE festivalier SET nom = :nouveauNom WHERE login = :userId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':nouveauNom', $nouveauNom);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }

    // modification du prenom

    public function modifierPrenom($nouveauPrenom, $userId) {
        $query = "UPDATE festivalier SET prenom = :nouveauPrenom WHERE login = :userId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':nouveauPrenom', $nouveauPrenom);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }

    // modification de l'email

    public function modifierEmail($nouveauEmail, $userId) {
        $query = "UPDATE festivalier SET email = :nouveauEmail WHERE login = :userId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':nouveauEmail', $nouveauEmail);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }
}
?>
</body>
</html>
