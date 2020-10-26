<?php $this->title = "Profil"; ?>
<?php $this->session->set('page', 'profil');?>

<!--Display Title-->
<div class="bo_titles">

    <!--Title-->
    <h2>Profil</h2>
    <p>Vous pouvez modifier dans cette espace votre pseudonyme, mot de passe ou biographie.</p>

    <!--Alerts-->
    <div class="bo_alertArea">
        <?php $alert = $this->session->get('alert');?>
        <?php if (!empty($alert)) : ?>
            <div class="bo_alert"><i class="fas fa-comment-dots"></i><?php echo $alert;?></div>
        <?php endif ?> 
        <?php $this->session->remove('alert');?>
    </div>
</div>

<div class="bo_Container">

    <!--Display the text editor-->
    <div class="bo_editor">

        <!--Form to update username and password-->
        <form action="../index.php?path=profil" method="POST">

            <div class="bo_fields">
                <h3>Pseudonyme :</h3>
                <input type="text" name="pseudo" class="fieldSizing" value="<?php echo $username[0];?>"
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

        <!--Form to update Bio-->
        <form action="../index.php?path=bioUpdate" method="POST">
            
            <div class="bo_fields">
                <h3>Le contenu de la Bio :</h3>
                <textarea id="mytextarea" name="myBio"><?php echo htmlspecialchars($bioText->getBio());?></textarea>
            </div>
            
            <input type="submit" class="bo_btn" value="Mettre à jour la bio" id="submit2" name="submit">

        </form>

    </div>

</div>
