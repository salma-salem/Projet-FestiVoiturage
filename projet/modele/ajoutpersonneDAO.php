<html>
<head>
<title>ajoutpersonne modele</title>

</head>
<body>
<?php

class ajoutpersonneDAO {
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
    
        public function ajouterUtilisateur($login, $nom, $prenom, $date_arriver, $festivale) {
            try {
                $sql = "UPDATE festivalier
                        SET recherche = '1', date_arriver = :date_arriver, festivale = :festivale
                        WHERE login = :login";
                $requete = $this->connexion->prepare($sql);
                $requete->bindParam(':login', $login);
                $requete->bindParam(':date_arriver', $date_arriver);
                $requete->bindParam(':festivale', $festivale);
                $requete->execute();
    
                return true;
            } catch(PDOException $e) {
                echo "Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage();
                return false;
            }
        }
    }
    

?>

</body>
</html>
