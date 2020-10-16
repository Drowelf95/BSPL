<?php $this->title = "Gestion"; ?>
<?php $this->session->set('page', 'billets');?>

<!--Display Title and options of the selected area-->
<div class="bo_titles">
    <h2>Billets</h2>
    <div class="bo_options">
        <p><a href="index.php?path=editor"><i class="fas fa-i-cursor"></i>Créer</a></p>
        <?php 
        $isBinEmpty = $this->session->get('postBin');
        if ($isBinEmpty == 'full') {?>
            <p><a href="index.php?path=articleBin"><i class="far fa-trash-alt"></i>Corbeille</a></p>
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

    <?php foreach ($articles as $article) { ?>

    <div class="bo_artcomTitle">
        <h3>
        <a href="../index.php?path=frontView&chapterId=<?php echo $article->getChapter();?>&articleId=<?php echo $article->getId(); ?>" target="blank">
                Chapitre : <?php echo ($article->getChapter());?> -
                <?php echo ($article->getTitle());?></a>
        </h3>

        <div class="bo_artcomContent">
            <p><?php echo substr($article->getContent(),0,300);?></p>
        </div>
    </div>

    <div class="bo_postInfosContainer">
        <div class="bo_postInfos">
            <p>Auteur : <?php echo ($article->getAuthor());?></p>
            <p>Créé le : <?php echo ($article->getCreatedAt());?></p>
            <div class="bo_postOptions">
                <p><a href="../index.php?path=frontView&chapterId=<?php echo $article->getChapter();?>&articleId=<?php echo $article->getId(); ?>" target="blank"><i
                            class="far fa-eye"></i>Visualiser</a></p>
                <p><a href="../index.php?path=editArticle&articleId=<?php echo $article->getId(); ?>"><i
                            class="far fa-edit"></i>Modifier</a></p>
                <p class="bo_delete"><a href="../index.php?path=trashArticle&articleId=<?php echo $article->getId(); ?>"><i
                            class="far fa-trash-alt"></i>Supprimer</a></p>
                </a>
            </div>
        </div>
    </div>
    <br>

    <?php } ?>

</div>