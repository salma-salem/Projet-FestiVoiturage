<html>
<head>
<title>Connexion modele</title>

</head>
<body>
<?php

class ConnexionDAO { // methode vu sur internet
    private $connexion;


    // Fonction pour connecter la base de donnee


    public function __construct($servername, $username, $password, $database) {
        try {
            // Création d'une connexion PDO avec les informations fournies
            $this->connexion = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
            
            // Configuration de l'attribut ERRMODE pour afficher les erreurs PDO
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            // En cas d'erreur lors de la connexion, affichage du message d'erreur
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
        }
    }

    // Fonction pour vérifier si le login et le mot de passe existent

    // si retourne vrai alors il y a un compte, si retourne faux pas de compte 
    public function verifierConnexion($login, $mdp) {
        try {
            // Requête SQL pour compter le nombre d'occurrences du login et mot de passe dans la table "connexion"
            $sql = "SELECT COUNT(*) FROM connexion WHERE login = :login AND mdp = :mdp";
            $requete = $this->connexion->prepare($sql);
            
            // Association des valeurs des paramètres de la requête avec les variables fournies
            $requete->bindParam(':login', $login);
            $requete->bindParam(':mdp', $mdp);
            
            // Exécution de la requête
            $requete->execute();

            // Récupération du résultat (nombre d'occurrences) de la requête
            $resultat = $requete->fetchColumn();

            // Retourne vrai si le résultat est supérieur à 0, sinon retourne faux
            return $resultat > 0;
        } catch(PDOException $e) {
            // En cas d'erreur lors de l'exécution de la requête, affichage du message d'erreur
            echo "Erreur lors de la vérification de la connexion : " . $e->getMessage();
            return false;
        }
    }
}

?>
</body>
</html>