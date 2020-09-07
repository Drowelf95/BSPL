<?php $this->title = "Connexion"; ?>

<div class="dispFlex loadingPage">

<a href= "index.php"><p class="retrun_btn"><i class="fas fa-arrow-left"></i></p></a>

    <div class="mdpContainer">

        <div class="dispFlex titleContainer">
            <h1>Blog</h1>
            <img src="../public/img/iceberg.png">
            <h1>Admin</h1>
        </div>

        <form method="post" action="../public/index.php?path=login" >
            <div class="inputLines">

                <h2>Identifiant</h2>
                <input type="text" id="pseudo" name="pseudo" placeholder="Tapez votre identifiant ici." value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>" required />


                <h2>Mot de passe</h2>
                <input type="password" id="password" name="password" placeholder="Tapez votre mot de passe ici." required />

            </div>

            <div class="dispFlex">
                <input type="submit" class="bigBtn" value="Valider" id="submit" name="submit">
            </div>

        </form>

        <div class="dispFlex mdpForgotten">
            <p>Mot de passe oublié ? <a href="">Cliquez-ici.</a></p>
        </div>

    </div>

</div>
