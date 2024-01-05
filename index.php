<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PgConnect";

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
    $prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
    $motDePasse = isset($_POST["motDePasse"]) ? $_POST["motDePasse"] : "";
    $confirmePasse = isset($_POST["confirmePasse"]) ? $_POST["confirmePasse"] : "";

    try {
        // Création de la connexion avec la base de données
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    // Création de la table (à ne faire qu'une seule fois)
    $sql = "CREATE TABLE IF NOT EXISTS Utilisateur (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(30) NOT NULL,
        prenom VARCHAR(30) NOT NULL,
        motDePasse VARCHAR(255) NOT NULL,
        confirmePasse VARCHAR(50) NOT NULL
    )";

    try {
        $conn->exec($sql);
        echo "Table Utilisateur created successfully";
    } catch (PDOException $e) {
        echo "Error creating table: " . $e->getMessage();
    }

    try {
        $La_Clef = "password";
        // Utilisation de AES_ENCRYPT() pour hacher le mot de passe
        $sql = "
            INSERT INTO Utilisateur (nom, prenom, motDePasse, confirmePasse)
            VALUES(:nom, :prenom, AES_ENCRYPT(:motDePasse, '$La_Clef'), :confirmePasse)";
        $sth = $conn->prepare($sql);
        $sth->bindParam(':nom', $nom);
        $sth->bindParam(':prenom', $prenom);
        $sth->bindParam(':motDePasse', $motDePasse);
        $sth->bindParam(':confirmePasse', $confirmePasse);
        $sth->execute();

        // Stocker le prénom et le mot de passe dans des variables de session
        session_start();
        $_SESSION['prenom'] = $prenom;
        $_SESSION['motDePasse'] = $motDePasse;
        //$_SESSION['motDePasseEncrypte'] = AES_ENCRYPT($motDePasse, $La_Clef);

        // On renvoie l'utilisateur vers la page de remerciement
        header("Location: home.php");
        exit; // Assurez-vous de terminer l'exécution du script ici
    } catch (PDOException $e) {
        echo 'Impossible de traiter les données. Erreur : ' . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Inscription</title>
</head>

<body>
    <div class="all">
        <div class="content">
            <div class="cont-head">
                <img src="assets/icone-inscri.svg" alt="">
                <h1>Inscription</h1>
            </div>
            <div class="cont-body">
                <form action="" method="post">
                    <div class="lab-inp">
                        <p>Nom : </p>
                        <label class="lab-pa" for="name">
                            <input class="rond-inp" id="name" type="text" name="nom" required>
                        </label>
                    </div>

                    <div class="lab-inp">
                        <p>Prénom : </p>
                        <label class="lab-pa" for="surname">
                            <input class="rond-inp" id="surname" type="text" name="prenom" required>
                        </label>
                    </div>

                    <div class="lab-inp">
                        <p>Mot de passe : </p>
                        <label class="lab-pa" for="pass">
                            <input class="rond-inp" id="pass" type="password" name="motDePasse" required>
                        </label>
                    </div>

                    <div class="lab-inp">
                        <p>Confirmer : </p>
                        <label class="lab-pa" for="confirm">
                            <input class="rond-inp" id="confirm" type="password" name="confirmePasse" required>
                        </label>
                    </div>
                    <div class="btn">
                        <button type="submit">Inscription</button>
                        <button type="reset">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>