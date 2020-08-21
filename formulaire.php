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

            <div class="inputLines">
                <h2>Identifiant</h2>
                <input type="text" name="Identifiant" placeholder="Tapez votre identifiant ici." />
                <h2>Mot de passe</h2>
                <form action="security.php" method="post">
                    <input type="password" name="pass" placeholder="Tapez votre mot de passe ici." />
                
            </div>

            <div class="dispFlex">
                <input type="submit" class="bigBtn" value="Valider">
            </div>
            </form>

            <div class="dispFlex mdpForgotten">
                <p>Mot de passe oublié ? Cliquez-ici.</p>
            </div>
        </div>

    </div>

</body>

</html>