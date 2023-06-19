<!DOCTYPE html>
<html>
<head>
  <title>modification recherche modele</title>
</head>
<body>


<?php
class ModifrechercheDAO {
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

    // modification de la date d'arriver 
    public function modifierdate($nouvedate, $userId) {
        $query = "UPDATE recherche SET date_arriver = :nouvedate WHERE id = :userId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':nouvedate', $nouvedate);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }

    // modification du festival

    public function modifierfesti($nouveaufest, $userId) {
        $query = "UPDATE recherche SET festival = :nouveaufest WHERE id = :userId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':nouveaufest', $nouveaufest);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    }

    // modification de la localisation
    
    public function modifierloca($nouveauloca, $userId) {
        
        $query = "UPDATE recherche SET localisation = :nouveauloca WHERE id = :userId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':nouveauloca', $nouveauloca);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        $_SESSION['message']= "reussi";

    }
}
?>


</body>
</html>