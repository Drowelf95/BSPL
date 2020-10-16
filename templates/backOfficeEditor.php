<?php $this->title = "Nouvel article"; ?>
<?php $this->session->set('page', 'billets');?>

<!--Display Title and options of the selected area-->
<div class="bo_titles">

    <!--Title-->
    <h2>Éditeur</h2>
    
    <!--Options-->
    <div class="bo_options">
        <p><a href="index.php?path=backOffice"><i class="fas fa-long-arrow-alt-left"></i>Retour</a></p>
    </div>
    
    <!--Alerts-->
    <div class="bo_alertArea">
        <div class="bo_alert"><p><?php echo isset($errors['chapter']) ? $errors['chapter'] : ''; ?></p></div>    
        <div class="bo_alert"><p><?php echo isset($errors['title']) ? $errors['title'] : ''; ?></p></div>
        <div class="bo_alert"><p><?php echo isset($errors['mytextarea']) ? $errors['mytextarea'] : ''; ?></p></div>
        <div class="bo_alert"><p><?php echo isset($errors['author']) ? $errors['author'] : ''; ?></p></div>

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
        <form action="../index.php?path=editor" method="POST"  enctype="multipart/form-data">
            <div class="bo_fields">
                <?php $maxChapt = $this->session->get('maxChapt');?>
                <?php $propChapt = $maxChapt[0] + 1 ;?>
                <h3>Chapitre :</h3>
                <p class="bo_editor_suggest">Suggestion automatique</p>
                <input type="number" id="chapter" name="chapter" class="fieldSizing" value="<?php echo $propChapt ;?>"
                    placeholder="Numéro du chapitre ici">
            </div>

            <div class="bo_fields">
                <h3>Titre :</h3>
                <input type="text" id="title" name="title" class="fieldSizing" placeholder="Votre titre ici" required>
            </div>

            <div class="bo_fields">
                <h3>Votre contenu :</h3>
                <textarea id="mytextarea" name="mytextarea" placeholder="Un nouveau chapitre!"></textarea>
            </div>

            <div class="bo_fields">
                <h3>Charger une image :</h3>
                <input type="file" name="photo" id="photo" class="fieldSizing">
            </div>

            <div class="bo_fields">
                <h3>Auteur :</h3>
                <p class="bo_editor_suggest">Suggestion automatique</p>
                <input type="text" id="author" name="author" class="fieldSizing" value="Jean Forteroche" required>
            </div>

            <div class="bo_submit">
                <input type="submit" class="bo_btn" value="Enregistrer" id="submit" name="submit">
                <p class="bo_date">date : <?php setlocale(LC_TIME, "fr_FR"); echo strftime('%A le %d %B %Y'); ?></p>
            </div>
        </form>
    </div>

</div>
