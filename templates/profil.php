<?php $this->title = "Profil"; ?>

<!--Display Title-->
<div class="bo_titles">
    <h2>Profil</h2>
    <p>Vous pouvez modifier dans cette espace votre pseudonyme, mot de passe ou biographie.</p>
    <div class="bo_alertArea">
        <?php $alert = $this->session->get('alert');?>
        <?php if (!empty($alert)) {?>
            <div class="bo_alert"><i class="fas fa-comment-dots"></i><?php echo $alert;?></div>
        <?php } 
        $this->session->remove('alert');?>
    </div>
</div>

<div class="bo_Container">

    <!--Display the text editor-->
    <div class="bo_editor">
    <form action="../public/index.php?path=profil" method="POST">
        <div class="bo_fields">
            <h3>Pseudonyme :</h3>
            <input type="text" name="pseudo" class="fieldSizing" value=""
                placeholder="Nouveau pseudonyme" required>
        </div>

        <div class="bo_fields">
            <h3>Mot de passe :</h3>
            <input type="password" name="password" class="fieldSizing" placeholder="Nouveau mot de passe" required>
        </div>

        <div class="bo_fields">
            <h3>Confirmation du mot de passe :</h3>
            <input type="password" name="password_conf" class="fieldSizing" placeholder="Confirmer le mot de passe" required>
        </div>

        <div class="bo_submit">
            <input type="submit" class="bo_btn" value="Mettre à jour" id="submit" name="submit">
        </div>
    </form>

    <form action="../public/index.php?path=bioUpdate" method="POST">
        <div class="bo_fields">
                    <h3>Le contenu de la Bio :</h3>
                    <textarea id="mytextarea" name="myBio"><?php echo $bioText->getBio();?></textarea>
        </div>
        <input type="submit" class="bo_btn" value="Mettre à jour" id="submit" name="submit">
    </form>
    </div>
</div>
