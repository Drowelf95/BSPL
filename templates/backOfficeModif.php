<?php $this->title = "Modifications"; ?>

<!--Display Title and options of the selected area-->
<div class="bo_titles">
    <h2>Modifications</h2>
    <div class="bo_options">
        <p><a href="index.php?path=backOffice"><i class="fas fa-long-arrow-alt-left"></i>Retour</a></p>
        <p><a href="index.php?path=trash"><i class="far fa-trash-alt"></i>Corbeille</a></p>
    </div>
</div>

<div class="bo_Container">

    <!--Display the text editor-->
    <div class="bo_editor">
        <form method="post" action="../public/index.php?path=editArticle&articleId=<?php echo htmlspecialchars($article->getId());?>">
            <div class="bo_fields">
                <h3>Chapitre :</h3>
                <input type="text" id="chapter" name="chapter" class="fieldSizing" value="<?php echo $article->getChapter();?>">
            </div>

            <div class="bo_fields">
                <h3>Titre :</h3>
                <input type="text" id="title" name="title" class="fieldSizing" value="<?php echo $article->getTitle();?>">
            </div>

            <div class="bo_fields">
                <h3>Votre contenu :</h3>
                <textarea id="mytextarea" name="mytextarea"><?php echo $article->getContent();?></textarea>
            </div>

            <div class="bo_fields">
                <h3>Charger une image :</h3>
                <input type="text" name="upload" class="fieldSizing" >
            </div>

            <div class="bo_fields">
                <h3>Auteur :</h3>
                <input type="text" id="author" name="author" class="fieldSizing"  value="<?php echo $article->getAuthor();?>" required>
            </div>

            <div class="bo_submit">
                <input type="submit" class="bo_btn" value="Mettre à jour" id="submit" name="submit">
                <p class="bo_date">date : <?php 
            setlocale(LC_TIME, "fr_FR");
            echo strftime('%A le %d %B %Y'); ?></p>
            </div>
        </form>
    </div>
</div>
