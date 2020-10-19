<?php $this->title = "Corbeille"; ?>
<?php $this->session->set('page', 'commentaires');?>

<!--Display Title and options of the selected area-->
<div class="bo_titles">

    <!--Title-->
    <h2>Corbeille</h2>
    
    <!--Options-->
    <div class="bo_options">
        <p><a href="index.php?path=comments"><i class="fas fa-long-arrow-alt-left"></i>Retour</a></p>
    </div>
    
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

    <?php foreach ($comments as $comment) { ?>

    <div class="bo_comWrapper">

        <!--Username and chapter-->
        <div class="bo_artcomTitle">
            <h3><?php echo ($comment->getPseudo());?></h3>
            <p class="bo_com_infos">Chapitre : <?php echo $comment->getArticle()->getChapter();?> - <?php echo $comment->getArticle()->getTitle();?></p>
        </div>

        <!--Content-->
        <div class="bo_artcomContent">
            <p><?php echo $comment->getContent();?></p>
        </div>

    </div>

    <div class="bo_postInfosContainer">

        <!--Post infos-->
        <div class="bo_postInfos">

            <p>Créé le : <?php echo ($comment->getCreatedAt());?></p>

            <?php $linked = $comment->getArticle()->getDeleted();?>

            <div class="dispFlex">
                <?php if($linked !== '0') : ?> 
                    <p class="bo_editor_suggest">Article également dans la corbeille</p>
                <?php endif ?>
            </div>

            <div class="bo_postOptions">
                <!--Check if removing from trash is possible-->
                <?php if($linked !== '1') : ?> 
                    <p><a href="../index.php?path=untrashComment&commentId=<?php echo $comment->getId();?>"><i
                        class="fas fa-undo-alt"></i>Sortir de la corbeille</a></p>
                <?php endif ?>
                <p class="articlePermDel bo_delete" id="btnDel-<?php echo $comment->getId();?>"><i class="far fa-trash-alt"></i>Supprimer</p>
            </div>

        </div>

        <!--Options to permenantly delete-->
        <div class="bo_permDelete dispNone" id="confDel-<?php echo $comment->getId();?>">
            <p>Souhaitez-vous définitivement supprimer ce commentaire ? </p>
            <p class="bo_permYes"><a href="../index.php?path=deleteComment&commentId=<?php echo $comment->getId();?>">Oui</a></p>
            <p class="bo_permNo">Non</p>
        </div>
    
    </div>
    
    <br>

    <?php } ?>

</div>