<?php $this->title = "Gestion"; ?>

<div class="bo_Container">

    <!--Display Title and options of the selected area-->
    <div class="bo_titles">
        <h2>Billets</h2>
        <div class="bo_options">
            <p><a href="index.php?path=editor"><i class="fas fa-i-cursor"></i>Créer</a></p>
            <p><a href="index.php?path=trash"><i class="far fa-trash-alt"></i>Corbeille</a></p>
        </div>
    </div>

    <?php
    foreach ($articles as $article)
    {
        ?>
    <h3><a
            href="../public/index.php?path=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a>
    </h3>
    <div class="bo_postContent">
        <p><?= htmlspecialchars($article->getContent());?></p>
    </div>
    <div class="bo_postInfos">
        <p>Auteur : <?= htmlspecialchars($article->getAuthor());?></p>
        <p><?= htmlspecialchars ($donnees['date_crea'])?></p>
        <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
    </div>
    <div class="bo_postOptions">
        <p>Visualiser</p>
        <p><a href="../public/index.php?path=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a></p>
        <p>Supprimer</p>
        </a>
    </div>
    <br>
    <?php
    }
    ?>

</div>