<!DOCTYPE html>
<html>
<head>
  <title> ajout personnes modele </title>
</head>


<body>
<?php

class ajoutpersonneDAO {
    private $connexion;

    //connexion a la base de donner

    public function __construct($servername, $username, $password, $database) {
        try {
            $this->connexion = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }

    //verifier s'il existe au moins un compte avec ce login

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

    //ajout d'une recherche avec les informations que l'utilisateur a rentré
    
    public function ajouterUtilisateur($login, $nom, $prenom, $localisation, $festivale, $email, $date_arriver) {
        try {
            $id = uniqid(); // Génère un ID aléatoire

            $sql = "INSERT INTO recherche (id, email, festivale, localisation, date_arriver, login, nom, prenom) 
                    VALUES (:id, :email, :festivale, :localisation, :date_arriver, :login, :nom, :prenom)";
            $requete = $this->connexion->prepare($sql);
            $requete->bindParam(':id', $id);
            $requete->bindParam(':email', $email);
            $requete->bindParam(':festivale', $festivale);
            $requete->bindParam(':localisation', $localisation);
            $requete->bindParam(':date_arriver', $date_arriver);
            $requete->bindParam(':login', $login);
            $requete->bindParam(':nom', $nom);
            $requete->bindParam(':prenom', $prenom);
            $requete->execute();

            return true;
        } catch(PDOException $e) {
            echo "Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage();
        }
    }
}

?>
</body>
</html>