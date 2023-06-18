<html>
<head>
<title>ajoutpersonne modele</title>

</head>
<body>
<?php

class critDAO {
    private $connexion;

    public function __construct($servername, $username, $password, $database) {
        try {
            $this->connexion = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }

        public function verifierConnexion($login) {
            try {
                $sql = "SELECT COUNT(*) FROM connexion WHERE login = :login";
                $requete = $this->connexion->prepare($sql);
                $requete->bindParam(':login', $login);
                $requete->execute();
                $resultat = $requete->fetchColumn();
    
                return $resultat > 0;
            } catch(PDOException $e) {
                echo "Erreur lors de la vérification de la connexion : " . $e->getMessage();
                return false;
            }
        }
    
        public function annonce($dispo) {
            try {
                $stmt = $this->connexion->query("SELECT *
                        from annonce 
                        WHERE place disponible = :dispo") ;
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch(PDOException $e) {
                echo "Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage();
                return [];
            }
        }
    }
    

?>

</body>
</html>
