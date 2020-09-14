<?php $this->title = "Gestion"; ?>

<!--Display Title and options of the selected area-->
<div class="bo_titles">
    <h2>Billets</h2>
    <div class="bo_options">
        <p><a href="index.php?path=editor"><i class="fas fa-i-cursor"></i>Créer</a></p>
        <p><a href="index.php?path=articleBin"><i class="far fa-trash-alt"></i>Corbeille</a></p>
    </div>
</div>

<div class="bo_Container">

    <?php foreach ($articles as $article) { ?>

    <div class="bo_artcomTitle">
        <h3>
            <a href="../public/index.php?path=frontView&articleId=<?= $article->getId(); ?>" target="blank">
                Chapitre : <?php echo htmlspecialchars($article->getChapter());?> -
                <?php echo htmlspecialchars($article->getTitle());?></a>
        </h3>

        <div class="bo_artcomContent">
            <p><?php echo $article->getContent();?></p>
        </div>
    </div>

    <div class="bo_postInfosContainer">
        <div class="bo_postInfos">
            <p>Auteur : <?php echo htmlspecialchars($article->getAuthor());?></p>
            <p>Créé le : <?php echo htmlspecialchars($article->getCreatedAt());?></p>
            <div class="bo_postOptions">
                <p><a href="../public/index.php?path=frontView&articleId=<?= $article->getId(); ?>" target="blank"><i
                            class="far fa-eye"></i>Visualiser</a></p>
                <p><a href="../public/index.php?path=editArticle&articleId=<?= $article->getId(); ?>"><i
                            class="far fa-edit"></i>Modifier</a></p>
                <p><a href="../public/index.php?path=trashArticle&articleId=<?= $article->getId(); ?>"><i
                            class="far fa-trash-alt"></i>Supprimer</a></p>
                </a>
            </div>
        </div>
    </div>
    <br>

    <?php } ?>

</div>