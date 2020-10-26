<?php $this->title = "Gestion"; ?>
<?php $this->session->set('page', 'billets');?>

<!--Display Title and options of the selected area-->
<div class="bo_titles">

    <!--Title-->
    <h2>Billets</h2>

    <!--Options-->
    <div class="bo_options">
        <p><a href="index.php?path=editor"><i class="fas fa-i-cursor"></i>Créer</a></p>
        <?php $isBinEmpty = $this->session->get('postBin') ;?>
        <?php if ($isBinEmpty == 'full') : ?>
            <p><a href="index.php?path=articleBin"><i class="far fa-trash-alt"></i>Corbeille</a></p>
        <?php endif ?>
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

    <div class="bo_artcomTitle">

        <!--Title & chapter-->
        <h3><a href="../index.php?path=frontView&chapterId=<?php echo $article->getChapter();?>&articleId=<?php echo $article->getId(); ?>" target="blank">
                Chapitre : <?php echo htmlspecialchars($article->getChapter());?> -
                <?php echo htmlspecialchars($article->getTitle());?></a></h3>

        <!--Content-->
        <div class="bo_artcomContent">
            <p><?php echo substr($article->getContent(),0,300);?></p>
        </div>
    </div>

    <div class="bo_postInfosContainer">

        <!--Post infos-->
        <div class="bo_postInfos">

            <p>Auteur : <?php echo htmlspecialchars($article->getAuthor());?></p>
            <p>Créé le : <?php echo htmlspecialchars($article->getCreatedAt());?></p>
            
            <!--Options-->
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