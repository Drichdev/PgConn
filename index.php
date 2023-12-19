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