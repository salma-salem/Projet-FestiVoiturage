<html>
<head>
<title>Inscription modele</title>
</head>
<body>
<?php

class InscriptionDAO {
    private $connexion;

    //connexion a la base de donnee

    public function __construct($servername, $username, $password, $database) {
        try {
            $this->connexion = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }

    // verification qu'il n'existe pas deja un compte avec ce login
    public function verifierConnexion($login) {
        try {
            $sql = "SELECT COUNT(*) FROM festivalier WHERE login = :login ";
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


    // si il n'existe pas de compte on ajoute l'utilisateur

    
    public function ajouterUtilisateur($login, $mdp, $nom, $prenom, $email) {
        if ($this->verifierConnexion($login)) {
            echo "Compte déjà existant";
        } else {
            try {
                $sqlbis = "INSERT INTO festivalier (login, mdp, nom, prenom, email) VALUES (:login, :mdp, :nom, :prenom, :email)";
                $requete2 = $this->connexion->prepare($sqlbis);
                $requete2->bindParam(':login', $login);
                $requete2->bindParam(':mdp', $mdp);
                $requete2->bindParam(':nom', $nom);
                $requete2->bindParam(':prenom', $prenom);
                $requete2->bindParam(':email', $email);
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
