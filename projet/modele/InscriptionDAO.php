<html>
<head>
<title>Inscription modele</title>

</head>
<body>
<?php

class InscriptionDAO {
    private $connexion;

    public function __construct($servername, $username, $password, $database) {
        try {
            $this->connexion = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }

    public function verifierConnexion($login, $mdp) {
        try {
            $sql = "SELECT COUNT(*) FROM connexion WHERE login = :login AND mdp = :mdp";
            $requete = $this->connexion->prepare($sql);
            $requete->bindParam(':login', $login);
            $requete->bindParam(':mdp', $mdp);
            $requete->execute();
            $resultat = $requete->fetchColumn();

            return $resultat > 0;
        } catch(PDOException $e) {
            echo "Erreur lors de la vérification de la connexion : " . $e->getMessage();
            return false;
        }
    }

    public function ajouterUtilisateur($login, $mdp, $nom, $prenom,$date_arriver) {
        if ($this->verifierConnexion($login, $mdp)) {
            echo "Compte déjà existant";
        } else {
            try {
                $sql = "INSERT INTO connexion (login, mdp) VALUES (:login, :mdp)";
                $requete = $this->connexion->prepare($sql);
                $requete->bindParam(':login', $login);
                $requete->bindParam(':mdp', $mdp);
                $requete->execute();

                $sqlbis = "INSERT INTO festivalier (login, mdp,nom, prenom,date_arriver) VALUES (:login, :mdp,:nom, :prenom, :date_arriver)";
                $requete2 = $this->connexion->prepare($sqlbis);
                $requete2->bindParam(':login', $login);
                $requete2->bindParam(':mdp', $mdp);
                $requete2->bindParam(':nom', $nom);
                $requete2->bindParam(':prenom', $prenom);
                $requete2->bindParam(':date_arriver', $date_arriver);
                $requete2->execute();

                return true;
            } catch(PDOException $e) {
                echo "Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage();
            }
        }
    }
}

?>

</body>
</html>
