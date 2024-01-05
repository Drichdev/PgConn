<?php
session_start();

if(isset($_SESSION['prenom'])) {
    $prenom = $_SESSION['prenom'];
} else {
    $prenom = "Invité";
}

if(isset($_SESSION['motDePasse'])) {
    $motDePasse = $_SESSION['motDePasse'];
} else {
    $motDePasse = "Mot de passe non disponible";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Home</title>
</head>

<body>
    <div class="content">
        <h1>Bienvenue <?php echo $prenom; ?></h1>
        <h2>Le vrai mot de passe est <?php echo $motDePasse; ?> </h2>
    </div>
</body>

</html>