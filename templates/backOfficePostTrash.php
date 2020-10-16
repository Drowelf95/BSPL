<?php $this->title = "Corbeille"; ?>
<?php $this->session->set('page', 'billets');?>

<!--Display Title and options of the selected area-->
<div class="bo_titles">

    <!--Title-->
    <h2>Corbeille</h2>
    
    <!--Options-->
    <div class="bo_options">
        <p><a href="index.php?path=backOffice"><i class="fas fa-long-arrow-alt-left"></i>Retour</a></p>
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

    <?php foreach ($articles as $article) { ?>

    <!--Title & chapter-->
    <div class="bo_articleWrapper">
        <h3>Chapitre : <?php echo ($article->getChapter());?> -
            <a href="../index.php?path=article&articleId=<?php echo ($article->getId());?>">
                <?php echo ($article->getTitle());?></a>
        </h3>

        <!--Content-->
        <div class="bo_postContent">
            <p><?php echo $article->getContent();?></p>
        </div>
    </div>

    <div class="bo_postInfosContainer">
        
        <!--Post infos-->
        <div class="bo_postInfos">
            
            <p>Auteur : <?php echo ($article->getAuthor());?></p>
            <p>Créé le : <?php echo ($article->getCreatedAt());?></p>
            
            <!--Options-->
            <div class="bo_postOptions">
                <p><a href="../index.php?path=untrashArticle&articleId=<?php echo $article->getId();?>"><i
                            class="fas fa-undo-alt"></i>Sortir de la corbeille</a></p>
                <p class="bo_delete articlePermDel" id="btnDel-<?php echo $article->getId(); ?>"><i class="far fa-trash-alt"></i>Supprimer</p>
                </a>
            </div>

        </div>

        <!--Options to permenantly delete-->
        <div class="bo_permDelete dispNone" id="confDel-<?php echo $article->getId(); ?>">
            <p>Souhaitez-vous définitivement supprimer cette article ? </p>
            <p class="bo_permYes"><a href="../index.php?path=deleteArticle&articleId=<?php echo $article->getId();?>">Oui</a></p>
            <p class="bo_permNo">Non</p>
        </div>

    </div>

    <br>

    <?php } ?>

</div>