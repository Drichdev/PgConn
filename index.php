<?php 


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "PgConnect";
// Création de la connexion avec la base de donnée

try {
    $conn = new PDO("mysql:host=$servername;dbname=PgConnect", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }


// Création de la table
$sql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(30) NOT NULL,
prenom VARCHAR(30) NOT NULL,
motDePasse VARCHAR(50),
confirmePasse VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

try {
if ($conn->query($sql) === TRUE) {
  echo "Table MyGuests created successfully";
} 
}
 catch(PDOException $e) {
  echo "Error creating table: " . $e->getMessage();
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
                            <input class="rond-inp" id="name" type="text">
                        </label>
                    </div>

                    <div class="lab-inp">
                        <p>Prénom : </p>
                        <label class="lab-pa" for="surname">
                            <input class="rond-inp" id="surname" type="text">
                        </label>
                    </div>

                    <div class="lab-inp">
                        <p>Mot de passe : </p>
                        <label class="lab-pa" for="pass">
                            <input class="rond-inp" id="pass" type="password">
                        </label>
                    </div>

                    <div class="lab-inp">
                        <p>Confirmer : </p>
                        <label class="lab-pa" for="confirm">
                            <input class="rond-inp" id="confirm" type="password">
                        </label>
                    </div>
                    <div class="btn">
                        <button type="submit">Connexion</button>
                        <button type="reset">Annuler</button>
                    </div>

                </form>
            </div>
        </div>

    </div>

</body>

</html>