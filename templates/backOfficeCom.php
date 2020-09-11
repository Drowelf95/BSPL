<?php $this->title = "Gestion"; ?>

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

        <div class="bo_postTitle">
            <h3><?php echo htmlspecialchars($comment->getPseudo());?></h3>
        </div>

        <div class="bo_postContent">
            <p><?php echo $comment->getContent();?></p>
        </div>

    </div>
    
        
    <div class="bo_comwrapperOpt">

        <div class="bo_postInfos">
            <p>Créé le : <?php echo htmlspecialchars($comment->getCreatedAt());?></p>
        </div>
        
        <div class="bo_postflaged">
            <?php if($comment->isFlag()) {?>
                <i class="fas fa-exclamation-triangle"></i>
            <?php }?>
        </div>

        <div class="bo_postOptions">
            <p><a href="../public/index.php?path=frontView&articleId=<?= $comment->getArticleID(); ?>" target="blank">Visualiser</a></p>
            <?php if($comment->isFlag()) {?>
                    <p>Valider le commentaire</p>
                <?php }?>    
            <p>Supprimer</p>
        </div> 

    </div>

    <?php } ?>

</div>