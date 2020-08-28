<?php require ('includes/header.php');?>

    <div class="dispFlex loadingPage">

        <div class="mdpContainer">

            <div class="dispFlex titleContainer">
                <h1>Blog</h1>
                <img src="assets/img/iceberg.png">
                <h1>Admin</h1>
            </div>

            <form action="index.php?action=formulaire" method="post">
                <div class="inputLines">

                    <h2>Identifiant</h2>
                    <input type="text" name="identifiant" placeholder="Tapez votre identifiant ici." required />


                    <h2>Mot de passe</h2>
                    <input type="password" name="pass" placeholder="Tapez votre mot de passe ici." required />

                </div>

                <div class="dispFlex">
                    <input type="submit" class="bigBtn" value="Valider">
                </div>

            </form>

            <div class="dispFlex mdpForgotten">
                <p>Mot de passe oublié ? <a href="">Cliquez-ici.</a></p>
            </div>
        </div>

    </div>

<?php require ('includes/footer.php');?>