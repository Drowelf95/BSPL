<?php $this->title = "Lecture"; ?>

<!--Display the close button-->
<div class="fv_Close">
    <a href="index.php"><i class="fas fa-times"></i></a>
</div>

<div class="Container">
    <!--Display the title plus Nav bar-->
    <div class="dispFlex fv_head">
        <h1>Billet simple pour l'Alaska</h1>

        <div class="dispFlex fv_navBar">
            <div class="fv_Nav">

                <div class="dispFlex fv_btnLeft">
                    <a href="">
                        <div class="dispFlex fv_Circle">
                            <i class="fas fa-chevron-left"></i>
                        </div>
                    </a>
                </div>

                <div class="dispFlex fv_btnCtr">
                    <div class="dispFlex fv_Circle">
                        <p>
                            <!--Chapter number-->
                        </p>
                    </div>
                </div>

                <div class="dispFlex fv_btnRight">
                    <a href="">
                        <div class="dispFlex fv_Circle">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </a>
                </div>

            </div>
            <div class="fv_btnBar">
            </div>
        </div>

        <div class="fv_navTitles">
            <div class="dispFlex fv_navTitle fv_navTitleEdges">
                <h2>Chapitre 01</h2>
            </div>
            <div class="dispFlex fv_navTitle">
                <h2>Chapitre 02</h2>
            </div>
            <div class="dispFlex fv_navTitle fv_navTitleEdges">
                <h2>Chapitre 03</h2>
            </div>
        </div>
    </div>

    <div class="dispFlex fv_Article">
        <div class="fv_articleContainer">
            <div class="dispFlex fv_articleImg">
                <img src="../public/img/iceberg.png">
            </div>
            <div class="fv_articleTitle">
                <h3>Titre du chapitre</h3>
            </div>
            <div class="fv_articleContent">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ut tristique odio. Aliquam tincidunt
                    cursus
                    mattis. Suspendisse neque enim, commodo ultricies orci vitae, faucibus tempor ante. Suspendisse sed
                    libero volutpat, pharetra lorem eu, fringilla urna. Nulla molestie ullamcorper leo a varius. Etiam
                    ultricies maximus felis, ut fermentum turpis malesuada ac. Nunc sit amet viverra urna, non imperdiet
                    nisi. Sed lobortis turpis eu tortor elementum, vitae molestie magna consequat. Aenean viverra
                    sodales
                    eros, molestie cursus turpis iaculis ut. Pellentesque habitant morbi tristique senectus et netus et
                    malesuada fames ac turpis egestas. Curabitur facilisis nisi sed massa suscipit, sed tristique risus
                    pellentesque.</p>
            </div>
            <div class="dispFlex fv_Comments">
                <div class="dispFlex fv_comBtn">
                    <p>Laisser un commentaire</p>
                </div>

                <div class="dispFlex fv_comArea dispNone">
                    <form action="" method="POST">
                        <h3>Pseudonyme</h3>
                        <input type="text" id="pseudo" name="pseudo" class="fieldComments"
                            placeholder="Tapez votre nom ou pseudonyme ici..." required>
                        <h3>Commentaire</h3>
                        <input type="text" id="comment" name="comment" class="fieldComments"
                            placeholder="Tapez votre commentaire ici..." required>
                        <div class="fv_comBtn2">
                            <input type="submit" class="bo_btn" value="Poster" id="submit" name="submit">
                            <p>Annuler</p>
                        </div>
                    </form>
                </div>
            </div>

            <div class="fv_articleComments">
                <h4>Toto</h4>
                <p>Ceci est un commentaire.</p>
                <div class="fv_comInfos">
                    <p>date : 01/02/2020 15:15:15</p>
                    <p>Signaler <i class="fas fa-exclamation-triangle"></i></p>
                </div>
            </div>
        </div>
    </div>
</div>