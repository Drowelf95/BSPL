<?php $this->title = "Lecture"; ?>

<!--Display the close button-->
<div class="fv_Close">
    <a href="index.php"><i class="fas fa-times"></i></a>
</div>

<!--Display the menu-->
<div class="dropdown fv_Menu">

  <p class="dropbtn "><i class="fas fa-bars"></i></p>
  
  <div class="dropdown-content">
    <?php foreach ($articles as $menuArticle) { ?>

        <a href="../index.php?path=frontView&chapterId=<?php echo $menuArticle->getChapter();?>&articleId=<?php echo ($menuArticle->getId());?>">
                Chapitre : <?php echo ($menuArticle->getChapter());?> - <?php echo ($menuArticle->getTitle());?></a>
    <?php } ?>  

  </div>

</div>

<div class="dispFlex Container">

    <!--Book title-->
    <div class="dispFlex fv_head">
        <h1>Billet simple pour l'Alaska</h1>
    </div>

    <!--Alerts-->
    <?php $alert = $this->session->get('alert');?>
    <div class="dispFlex bo_alertArea">
        <div class="bo_alert"><?php echo $alert;?></div>
    </div>
    <?php $alert = $this->session->remove('alert');?>

    <!--Content-->
    <div class="dispFlex fv_Article">

        <div class="fv_articleContainer">

            <!--Picture-->
            <?php $isThereAnImage = $article->getPhoto(); ?>
            <?php if ($isThereAnImage != '') : ?>
                <div class="dispFlex fv_articleImg">
                    <img src="../img/<?php echo $article->getPhoto();?>">
                </div>
            <?php endif ?>

            <!--Title & chapter-->
            <div class="fv_articleTitle">
                <h3>Chapitre : <?php echo htmlspecialchars($article->getChapter());?></h3>
                <h3><?php echo htmlspecialchars($article->getTitle());?></h3>
            </div>

            <!--Content-->
            <div class="fv_articleContent">
                <p><?php echo $article->getContent();?></p>
            </div>

            <!--Article infos-->
            <div class="fv_articleInfos">
                <p>Auteur : <?php echo htmlspecialchars($article->getAuthor());?></p>
                <p>Rédigé le : <?php echo htmlspecialchars($article->getcreatedAT());?></p>
            </div>

            <!--Nav bar-->
            <div class="dispFlex fv_navBox">

                <div class="dispFlex fv_navBar">

                    <div class="fv_Nav">

                        <!--button left-->
                        <div class="dispFlex fv_btnLeft">
                            <?php $minChapt = $this->session->get('firstChaptNumber');?>
                            <?php $actuChapt = $article->getChapter() ;?>
                            <?php if ($actuChapt !== $minChapt[0]) : ?>
                                <a href="index.php?path=btnPrev&chapterId=<?php echo ($article->getChapter());?>&articleId=<?php echo ($article->getId());?>">
                                <div class="dispFlex fv_Circle">
                                    <i class="fas fa-chevron-left"></i>
                                </div>
                            </a>
                            <?php else : ?>
                                <div class="dispFlex fv_Circle">
                                    <a href="index.php">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </div>
                            <?php endif ?>
                        </div>

                        <!--button middle-->
                        <div class="dispFlex fv_btnCtr">
                            <div class="dispFlex fv_Circle">
                                <p>
                                    <?php echo $article->getChapter();?>
                                </p>
                            </div>
                        </div>

                        <!--button right-->
                        <div class="dispFlex fv_btnRight">
                            <?php $maxChapt = $this->session->get('maxChapt');?>
                            <?php $actuChapt = $article->getChapter();?>
                            <?php if ($actuChapt !== $maxChapt[0]): ?>
                            <a href="index.php?path=btnNxt&chapterId=<?php echo ($article->getChapter());?>&articleId=<?php echo ($article->getId());?>">
                                <div class="dispFlex fv_Circle">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </a>
                            <?php else : ?>
                                <div class="dispFlex fv_Circle">
                                    <a href="index.php">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </div>
                            <?php endif ?>
                        </div>

                    </div>

                    <!--Graphic element - Bar-->
                    <span class="fv_btnBar"></span>

                </div>

                <div class="fv_navTitles">

                    <!--Title button previous-->
                    <div class="dispFlex fv_navTitle fv_navTitleEdges">
                        <?php if ($actuChapt !== $minChapt[0]): ?>    
                            <h2>Chapitre précédent</h2>
                        <?php else : ?>
                            <h2>Accueil</h2>
                        <?php endif ?>
                    </div>

                    <!--Active chapter-->
                    <div class="dispFlex fv_navTitle">
                        <h2>Chapitre <?php echo $article->getChapter();?></h2>
                    </div>

                    <!--Title button next-->
                    <div class="dispFlex fv_navTitle fv_navTitleEdges">
                        <?php if ($actuChapt !== $maxChapt[0]): ?>
                            <h2>Chapitre suivant</h2>
                        <?php else : ?>
                            <h2>Accueil</h2>
                        <?php endif ?>
                    </div>

                </div>

            </div>

            <div class="dispFlex fv_Comments">

                <!--Totle comment button-->
                <div class="dispFlex fv_comBtn">
                    <p>Laisser un commentaire</p>
                </div>

                <!--Comment form-->
                <div class="dispFlex fv_comArea dispNone">

                    <form action="index.php?path=addComment&chapterId=<?php echo ($article->getChapter());?>&articleId=<?php echo ($article->getId());?>" method="POST">
                        
                        <h3>Pseudonyme</h3>
                        <input type="text" id="pseudo" name="pseudo" class="fieldComments"
                            placeholder="Tapez votre nom ou pseudonyme ici..." required>
                        
                        <h3>Commentaire</h3>
                        <input type="text" id="content" name="content" class="fieldComments"
                            placeholder="Tapez votre commentaire ici..." required>
                        
                        <div class="fv_comBtn2">
                            <input type="submit" class="bo_btn" value="Ajouter" id="submit" name="submit">
                            <p class="fv_comCancel">Annuler</p>
                        </div>

                    </form>

                </div>

            </div>

            <!--Display comments through a loop-->
            <?php foreach ($comments as $comment) { ?>

            <div class="dispFlex fv_articleComments">
                
                <h4><?php echo htmlspecialchars($comment->getPseudo());?></h4>
                <p><?php echo htmlspecialchars($comment->getContent());?></p>
                
                <div class="fv_comInfos">
                    <p>date : <?php echo htmlspecialchars($comment->getcreatedAT());?></p>
                </div>

                <!--Alert option-->
                <div class="fv_signal">
                <?php if(!$comment->isFlag()) : ?>
                    <p><a href="../index.php?path=flagComment&chapterId=<?php echo ($article->getChapter());?>&commentId=<?php echo $comment->getID();?>&articleId=<?php echo ($article->getId());?>">
                            <i class="fas fa-exclamation-triangle"></i>
                            Signaler</a></p>
                    <?php else : ?>
                        <p class="fv_signalDone">Ce commentaire a été signalé.</p>
                    <?php endif ?>
                </div>

            </div>

            <?php }?>

        </div>

    </div>

</div>
