<!DOCTYPE html>
<html>
<head>
  <title>personnes recherche</title>
</head>
<body>
<?php

class recherche_locationDAO {
    private $pdo;

    public function __construct($servername, $username, $password, $database) {
        try {
            $this->pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }


    public function searchAnnonces($location, $date, $festival) {
        try {
            $query = "SELECT * FROM annonces WHERE";
            $params = [];
    
            if (!empty($location)) {
                $query .= " localisation = :location";
                $params[':location'] = $location;
            }
    
            if (!empty($date)) {
                if (!empty($location)) {
                    $query .= " AND";
                }
                $query .= " date_arriver = :date";
                $params[':date'] = $date;
            }
    
            if (!empty($festival)) {
                if (!empty($location) || !empty($date)) {
                    $query .= " AND";
                }
                $query .= " festival = :festival";
                $params[':festival'] = $festival;
            }
    
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
    
}


?>
</body>
</html>
