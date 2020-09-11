<?php $this->title = "Profil"; ?>

<!--Display Title-->
<div class="bo_titles">
    <h2>Profil</h2>
    <p>Vous pouvez modifier votre pseudonyme ainsi que votre mot de passe ici.</p>
</div>

<div class="bo_Container">

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

        <div class="bo_fields">
            <h3>Confirmation du mot de passe :</h3>
            <input type="text" name="password_conf" class="fieldSizing" placeholder="Confirmer le mot de passe" required>
        </div>

        <div class="errorMessage">
            <p><?php echo $this->session->get('errorMdp');?></p>
        </div>

        <div class="bo_submit">
            <input type="submit" class="bo_btn" value="Mettre à jour" id="submit" name="submit">
        </div>
    </form>
    </div>
</div>
