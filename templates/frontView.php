<?php $this->title = "Lecture"; ?>

<!--Display the close button-->
<div class="fv_Close">
    <a href="index.php"><i class="fas fa-times"></i></a>
</div>

<?php 
$max = $this->session->get('maxID');
$chaptNow = $article->getID();
$chaptPrev = $chaptNow -1;
$chaptNext = $chaptNow +1;
;?>

<div class="Container">
    <!--Display the title plus Nav bar-->
    <div class="dispFlex fv_head">
        <h1>Billet simple pour l'Alaska</h1>
    </div>

    <div class="dispFlex fv_Article">
        <div class="fv_articleContainer">

            <div class="dispFlex fv_articleImg">
                <img src="../public/img/iceberg.png">
            </div>

            <div class="fv_articleTitle">
                <h3>Chapitre : <?php echo $article->getChapter();?></h3>
                <h3><?php echo $article->getTitle();?></h3>
            </div>

            <div class="fv_articleContent">
                <p><?php echo $article->getContent();?></p>
            </div>

            <div class="fv_articleInfos">
                <p>Auteur : <?php echo $article->getAuthor();?></p>
                <p>Rédigé le : <?php echo $article->getcreatedAT();?></p>
            </div>

            <div class="dispFlex fv_navBox">
                <div class="dispFlex fv_navBar">
                    <div class="fv_Nav">

                        <div class="dispFlex fv_btnLeft">
                            <?php if ($chaptNow != 1){?>
                            <a href="index.php?path=frontView&articleId=<?php echo $chaptPrev;?>">
                                <div class="dispFlex fv_Circle">
                                    <i class="fas fa-chevron-left"></i>
                                </div>
                            </a>
                            <?php } else { ?>
                            <div class="dispFlex fv_Circle">
                                <i class="fas fa-times"></i>
                            </div>
                            <?php } ?>
                        </div>

                        <div class="dispFlex fv_btnCtr">
                            <div class="dispFlex fv_Circle">
                                <p>
                                    <?php echo $article->getChapter();?>
                                </p>
                            </div>
                        </div>

                        <div class="dispFlex fv_btnRight">
                            <?php if ($chaptNow != $max){?>
                            <a href="index.php?path=frontView&articleId=<?php echo $chaptNext;?>">
                                <div class="dispFlex fv_Circle">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </a>
                            <?php } else { ?>
                            <div class="dispFlex fv_Circle">
                                <i class="fas fa-times"></i>
                            </div>
                            <?php } ?>
                        </div>

                    </div>
                    <div class="fv_btnBar">
                    </div>
                </div>

                <div class="fv_navTitles">
                    <div class="dispFlex fv_navTitle fv_navTitleEdges">
                        <?php if ($chaptNow != 1){?>
                        <h2>Chapitre <?php echo $chaptPrev;?></h2>
                        <?php } ?>
                    </div>
                    <div class="dispFlex fv_navTitle">
                        <h2>Chapitre <?php echo $article->getChapter();?></h2>
                    </div>
                    <div class="dispFlex fv_navTitle fv_navTitleEdges">
                        <?php if ($chaptNow != $max){?>
                        <h2>Chapitre <?php echo $chaptNext;?></h2>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="dispFlex fv_Comments">
                <div class="dispFlex fv_comBtn">
                    <p>Laisser un commentaire</p>
                </div>

                <div class="dispFlex fv_comArea dispNone">
                    <form action="index.php?path=addComment" method="POST">
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

            <?php foreach ($comments as $comment) { ?>

            <div class="dispFlex fv_articleComments">
                <h4><?php echo $comment->getPseudo();?></h4>
                <p><?php echo $comment->getContent();?></p>
                <div class="fv_comInfos">
                    <p>date : <?php echo $comment->getcreatedAT();?></p>
                </div>

                <div class="fv_signal">
                <?php if(!$comment->isFlag()) {?>
                    <p><a href="../public/index.php?path=flagComment&commentId=<?= $comment->getID(); ?>">
                            <i class="fas fa-exclamation-triangle"></i>
                            Signaler</a></p>
                    <?php } else { ?>
                        <p class="fv_signalDone">Ce commentaire à était signalé.</p>
                    <?php }?>
                </div>
            </div>
            <br>

            <?php }?>
        </div>
    </div>
</div>