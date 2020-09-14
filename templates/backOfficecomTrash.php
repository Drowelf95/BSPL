<?php $this->title = "Corbeille"; ?>

<!--Display Title and options of the selected area-->
<div class="bo_titles">
    <h2>Commentaires</h2>
    <div class="bo_options">
        <p><a href="index.php?path=trash"><i class="far fa-trash-alt"></i>Corbeille</a></p>
    </div>
</div>

<div class="bo_Container">

    <?php foreach ($comments as $comment) { ?>

    <div class="bo_comWrapper">

        <div class="bo_artcomTitle">
            <h3><?php echo htmlspecialchars($comment->getPseudo());?></h3>
        </div>

        <div class="bo_artcomContent">
            <p><?php echo $comment->getContent();?></p>
        </div>

    </div>

    <div class="bo_postInfosContainer">
        <div class="bo_postInfos">

            <p>Créé le : <?php echo htmlspecialchars($comment->getCreatedAt());?></p>

            <div class="bo_postOptions">
                <p><a href="../public/index.php?path=frontView&articleId=<?= $comment->getArticleID(); ?>"
                        target="blank"><i class="far fa-eye"></i>Visualiser</a></p>
                <p><i class="far fa-trash-alt"></i>Supprimer</p>
            </div>

            <div class="bo_postflaged">
                <?php if($comment->isFlag()) {?>
                <i class="fas fa-exclamation-triangle"></i>
                <p><a href="../public/index.php?path=unflagComment&commentId=<?= $comment->getID(); ?>">Désignaler le
                        commentaire</a></p>
                <?php }?>
            </div>

        </div>
    </div>
    <br>

    <?php } ?>

</div>