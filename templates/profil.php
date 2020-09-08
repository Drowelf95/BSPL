<?php $this->title = "Profil"; ?>

<div class="bo_Container">

    <!--Display Title-->
    <div class="bo_titles">
        <h2>Profil</h2>
        <p>Vous pouvez modifier votre pseudonyme ainsi que votre mot de passe ici.</p>
    </div>

    <!--Display the text editor-->
    <div class="bo_editor">
    <form action="" method="POST">
        <div class="bo_fields">
            <h3>Pseudonyme :</h3>
            <input type="text" name="pseudo" class="fieldSizing" value=""
                placeholder="Nouveau pseudonyme" required>
        </div>

        <div class="bo_fields">
            <h3>Mot de passe :</h3>
            <input type="text" name="password" class="fieldSizing" placeholder="Nouveau mot de passe" required>
        </div>

        <div class="bo_submit">
            <input type="submit" class="bo_btn" value="Mettre à jour" id="submit" name="submit">
        </div>
    </form>
    </div>
</div>
