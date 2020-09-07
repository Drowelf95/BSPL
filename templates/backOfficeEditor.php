<?php $this->title = "Nouvel article"; ?>

<div class="bo_Container">

    <!--Display Title and options of the selected area-->
    <div class="bo_titles">
        <h2>Éditeur</h2>
        <div class="bo_options">
            <p><a href="index.php?path=backOffice"><i class="fas fa-long-arrow-alt-left"></i>Retour</a></p>
            <p><a href="index.php?path=trash"><i class="far fa-trash-alt"></i>Corbeille</a></p>
        </div>
    </div>

    <!--Display the text editor-->
    <div class="bo_editor">
        <form action="../public/index.php?path=editor" method="POST">
            <div class="bo_fields">
                <h3>Chapitre :</h3>
                <input type="text" id="chapter" name="chapter" class="fieldSizing" value=""
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
                <input type="text" name="upload" class="fieldSizing" placeholder="Copier ici le lien du fichier à charger">
            </div>

            <div class="bo_fields">
                <h3>Auteur :</h3>
                <input type="text" id="author" name="author" class="fieldSizing" value="Jean Foreteroche" required>
            </div>

            <div class="bo_submit">
                <input type="submit" class="bo_btn" value="Enregistrer" id="submit" name="submit">
                <p class="bo_date">date : <?php 
            setlocale(LC_TIME, "fr_FR");
            echo strftime('%A le %d %B %Y'); ?></p>
            </div>
        </form>
    </div>
</div>
