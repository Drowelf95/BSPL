<?php $this->title = "Corbeille"; ?>

<!--Display Title and options of the selected area-->
<div class="bo_titles">
    <h2>Corbeille</h2>
    <div class="bo_options">
        <p><a href="index.php?path=backOffice"><i class="fas fa-long-arrow-alt-left"></i>Retour</a></p>
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

    <?php foreach ($articles as $article) { ?>

    <div class="bo_articleWrapper">
        <h3>Chapitre : <?php echo htmlspecialchars($article->getChapter());?> -
            <a href="../index.php?path=article&articleId=<?php echo htmlspecialchars($article->getId());?>">
                <?php echo htmlspecialchars($article->getTitle());?></a>
        </h3>

        <div class="bo_postContent">
            <p><?php echo $article->getContent();?></p>
        </div>
    </div>

    <div class="bo_postInfosContainer">
        <div class="bo_postInfos">
            <p>Auteur : <?php echo htmlspecialchars($article->getAuthor());?></p>
            <p>Créé le : <?php echo htmlspecialchars($article->getCreatedAt());?></p>
            <div class="bo_postOptions">
                <p><a href="../index.php?path=frontView&articleId=<?php echo $article->getId(); ?>" target="blank"><i
                            class="far fa-eye"></i>Visualiser</a></p>
                <p><a href="../index.php?path=untrashArticle&articleId=<?php echo $article->getId();?>"><i
                            class="fas fa-undo-alt"></i>Sortir de la corbeille</a></p>
                <p class="bo_delete articlePermDel" id="btnDel-<?php echo $article->getId(); ?>"><i class="far fa-trash-alt"></i>Supprimer</p>
                </a>
            </div>
        </div>
        <div class="bo_permDelete dispNone" id="confDel-<?php echo $article->getId(); ?>">
            <p>Souhaitez-vous définitivement supprimer cette article ? </p>
            <p class="bo_permYes"><a href="../index.php?path=deleteArticle&articleId=<?php echo $article->getId();?>">Oui</a></p>
            <p class="bo_permNo">Non</p>
        </div>
    </div>
    <br>

    <?php } ?>

</div>