<?php $this->title = "Gestion"; ?>
<?php $this->session->set('page', 'commentaires');?>

<!--Display Title and options of the selected area-->
<div class="bo_titles">
    <h2>Commentaires</h2>
    <div class="bo_options">
    <?php 
        $isBinEmpty = $this->session->get('comBin');
        if ($isBinEmpty == 'full') {?>
            <p><a href="index.php?path=commentBin"><i class="far fa-trash-alt"></i>Corbeille</a></p>
        <?php }?>
    </div>
    <div class="bo_alertArea">
        <?php $alert = $this->session->get('alert');?>
        <?php if (!empty($alert)) {?>
        <div class="bo_alert"><i class="fas fa-comment-dots"></i><?php echo $alert;?></div>
        <?php } 
         $this->session->remove('alert');?>
    </div>
</div>

<div class="bo_Container">  
    <?php foreach ($comments as $comment) { ?>

    <div class="bo_comWrapper">

        <div class="bo_artcomTitle">
            <p>Chapitre : <?php echo $comment->getArticle()->getChapter();?> - <?php echo $comment->getArticle()->getTitle();?></p>
            <h3><?php echo ($comment->getPseudo());?></h3>
        </div>

        <div class="bo_artcomContent">
            <p><?php echo $comment->getContent();?></p>
        </div>

    </div>

    <div class="bo_postInfosContainer">
        <div class="bo_postInfos">

            <p>Créé le : <?php echo ($comment->getCreatedAt());?></p>

            <div class="bo_postOptions">
                <p><a href="../index.php?path=frontView&chapterId=<?php echo $comment->getArticle()->getChapter();?>&articleId=<?php echo $comment->getArticleID();?>"
                        target="blank"><i class="far fa-eye"></i>Visualiser</a></p>
                <p class="bo_delete"><a href="../index.php?path=trashComment&commentId=<?php echo $comment->getID(); ?>">
                <i class="far fa-trash-alt"></i>Supprimer</a></p>
            </div>

            <div class="bo_postflaged">
                <?php if($comment->isFlag()) {?>
                <i class="fas fa-exclamation-triangle"></i>
                <p><a href="../index.php?path=unflagComment&commentId=<?php echo $comment->getID(); ?>">Désignaler le
                        commentaire</a></p>
                <?php }?>
            </div>

        </div>
    </div>
    <br>

    <?php } ?>

</div>