<!DOCTYPE html>
<html>
<head>
  <title> ajout voiture modele </title>
</head>


<body>
<?php

class ajoutvoitureDAO {
    private $connexion;

    //connexion a la base de donnée

    public function __construct($servername, $username, $password, $database) {
        try {
            $this->connexion = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }
    // verification qu'il existe bien un compte relier a ce login
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

    public function ajouterannonce($conducteur, $festival, $location, $dispo, $date_arriver, $voiture, $login) {
        try {
            $id = uniqid(); // Génère un ID aléatoire

            $sql = "INSERT INTO annonces (id, conducteur, festival, localisation, dispo, date_arriver, voiture, login) 
                    VALUES (:id, :conducteur, :festival, :location, :dispo, :date_arriver, :voiture, :login)";
            $requete = $this->connexion->prepare($sql);
            $requete->bindParam(':id', $id);
            $requete->bindParam(':conducteur', $conducteur);
            $requete->bindParam(':festival', $festival);
            $requete->bindParam(':location', $location);
            $requete->bindParam(':dispo', $dispo);
            $requete->bindParam(':date_arriver', $date_arriver);
            $requete->bindParam(':voiture', $voiture);
            $requete->bindParam(':login', $login);
            $requete->execute();

            return true;
        } catch(PDOException $e) {
            echo "Erreur lors de l'ajout de l'annonce : " . $e->getMessage();
        }
    }
}

?>
</body>
</html>
