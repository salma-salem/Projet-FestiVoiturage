<!DOCTYPE html>
<html>
<head>
  <title>Profil modele</title>
</head>
<body>

<?php

class UserDAO {
    private $pdo;

    //connexion a la base de donnée
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }


    
    //recuperer les informations d'un utilisateur grace a son login
    public function getUserByUsername($username) {
        $query = "SELECT * FROM festivalier WHERE login = :username";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
</body>
</html>
