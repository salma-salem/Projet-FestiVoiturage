<!DOCTYPE html>
<html>
<head>
  <title> ajout personnes modele </title>
</head>


<body>
<?php

class ajoutfestivalDAO {
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
            $sql = "SELECT COUNT(*) FROM festivalier WHERE login = :login";
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

    //verifier si c'est bien un administrateur
    public function verifierAdmin($login) {
        try {
            $sql = "SELECT COUNT(*) FROM administrateur WHERE login = :login";
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
    
    public function ajouterFestival($nom, $date_debut, $date_fin, $localisation, $pic,$login) {
        if ($this->verifierConnexion($login)) { try {


            $uploadDirectory = '../image/';

        // Récupérez le nom du fichier et le chemin temporaire à partir de $_FILES['pic']
        $fileName = $_FILES['pic']['name'];
        $tmpFilePath = $_FILES['pic']['tmp_name'];

        // Générez un nom de fichier unique pour éviter les collisions
        $uniqueFileName = uniqid() . '_' . $fileName;

        // Déplacez le fichier téléchargé vers le répertoire de destination avec le nom unique
        $destinationPath = $uploadDirectory . $uniqueFileName;
        move_uploaded_file($tmpFilePath, $destinationPath);

        $imageData = file_get_contents($tmpFilePath);

            
            $id = uniqid(); // Génère un ID aléatoire

            $sql = "INSERT INTO festivale (id, nom, date_debut, localisation, date_fin, pic) 
                    VALUES (:id, :nom, :date_debut, :localisation, :date_fin, :pic)";
            $requete = $this->connexion->prepare($sql);
            $requete->bindParam(':id', $id);
            $requete->bindParam(':localisation', $localisation);
            $requete->bindParam(':nom', $nom);
            $requete->bindParam(':date_debut', $date_debut);
            $requete->bindParam(':date_fin', $date_fin);
            $requete->bindParam(':pic', $imageData, PDO::PARAM_LOB);
            $requete->execute();

            return true;
        } catch(PDOException $e) {
            echo "Erreur lors de l'ajout de l'utilisateur : " . $e->getMessage();
        }
    } else return false;
    }
}

?>
</body>
</html>