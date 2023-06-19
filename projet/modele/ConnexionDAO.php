<html>
<head>
<title>Connexion modele</title>
</head>
<body>
<?php

class ConnexionDAO {
    private $connexion;

    // connexion a la base de donnee

    public function __construct($servername, $username, $password, $database) {
        try {
            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false
            );
            $this->connexion = new PDO("mysql:host=$servername;dbname=$database", $username, $password, $options);
        } catch(PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }

    // verifier qu'il existe au moins un compte assosier a ce mot de passe et ce login
    
    public function verifierConnexion($login, $mdp) {
        try {
            $sql = "SELECT COUNT(*) FROM festivalier WHERE login = :login AND mdp = :mdp";
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
}

?>
</body>
</html>
