<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="assets/img/fire.png" />
    <title>Login</title>

    <link href="assets/fonts/Fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/mediaq.css" />
</head>

<body>

    <div class="dispFlex loadingPage">

        <div class="mdpContainer">

            <div class="dispFlex titleContainer">
                <h1>Blog</h1>
                <img src="assets/img/iceberg.png">
                <h1>Admin</h1>
            </div>

            <form action="process.php" method="post">
                <div class="inputLines">

                    <h2>Identifiant</h2>
                    <input type="text" name="identifiant" placeholder="Tapez votre identifiant ici." required />


                    <h2>Mot de passe</h2>
                    <input type="password" name="pass" placeholder="Tapez votre mot de passe ici." required />

                </div>

                <div class="dispFlex">
                    <input type="submit" class="bigBtn" value="Valider">
                </div>

                <?php if(isset($_GET['erreur'])) { 
                    echo "<span><p class="."loadingPage_error".">Veuillez saisir un identifant ou mot de passe correcte</p></span>";
                }?>

            </form>

            <div class="dispFlex mdpForgotten">
                <p>Mot de passe oublié ? <a href="backoffice.php">Cliquez-ici.</a></p>
            </div>
        </div>

    </div>

</body>

</html>