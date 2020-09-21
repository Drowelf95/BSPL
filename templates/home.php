<?php $this->title = "Accueil"; ?>

<div class="dispFlex landingPage">

        <div class="leftSide dispFlex">

            <p class="login"><a href="index.php?path=login"><i class="fas fa-user-lock"></i></a></p>
            <div class="infosContainer dispFlex">

                <h1>Jean FORTEROCHE</h1>
                <p>Auteur français & Youtuber, je suis un grand amateur des nouvelles technologies ! Je vous invite donc à découvrir mon nouveau roman sur cette plate-forme entièrement en ligne. Bonne lecture !</p>
            </div>

            <a href="index.php?path=bio"><p class="bigBtn">à propos</p></a>
            
        </div>

        <div class="rightSide dispFlex">

            <div class="infosContainer dispFlex">
                <h1>Billet simple pour l'Alaska</h1>
                <p>Le nouveau roman épisodique de Jean FORTEROCHE</p>
            </div>

            <?php $firstId = $this->session->get('firstIdNumber');?>
            <a href="index.php?path=frontView&articleId=<?php echo $firstId;?>"><p class="bigBtn">Lire</p></a>
           
        </div>
</div>