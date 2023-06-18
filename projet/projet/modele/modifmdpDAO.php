<!DOCTYPE html>
<html>
<head>
  <title>modification mdp modele</title>
</head>
<body>

<?php
class ModifmdpDAO {
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

    // verification que l'ancien mot de passe est bien correcte
    public function verifiermdp($oldmdp, $userId) {
        try {
            // Requête SQL pour compter le nombre d'occurrences du login et mot de passe dans la table "connexion"
            $sql = "SELECT COUNT(*) FROM festivalier WHERE login = :login AND mdp = :mdp";
            $requete = $this->pdo->prepare($sql);
            
            // Association des valeurs des paramètres de la requête avec les variables fournies
            $requete->bindParam(':login', $userId);
            $requete->bindParam(':mdp', $oldmdp);
            
            // Exécution de la requête
            $requete->execute();

            // Récupération du résultat (nombre d'occurrences) de la requête
            $resultat = $requete->fetchColumn();

            // Retourne vrai si le résultat est supérieur à 0, sinon retourne faux
            return $resultat > 0;
        } catch(PDOException $e) {
            echo "Erreur lors de la vérification du mot de passe : " . $e->getMessage();
            return false;
        }
    }

    // modification du mot de passe
    
    public function modifierMotDePasse($nouveauMotDePasse, $userId, $oldmdp) {
        if ($this->verifiermdp($oldmdp, $userId)) {
            try {
                $query = "UPDATE festivalier SET mdp = :nouveauMotDePasse WHERE login = :userId";
                $stmt = $this->pdo->prepare($query);
                $stmt->bindParam(':nouveauMotDePasse', $nouveauMotDePasse);
                $stmt->bindParam(':userId', $userId);
                $stmt->execute();
                $_SESSION['message'] = "La modification du mot de passe a réussi.";
                header('Location: User_controller.php');
                exit();
            } catch(PDOException $e) {
                echo "Erreur lors de la modification du mot de passe : " . $e->getMessage();
            }
        } else {
            return false;
        }
    }
}
?>


</body>
</html>