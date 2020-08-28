<?php require ('includes/header.php');?>
<?php require ('includes/menu.php');?>

<div class="bo_Container">

    <!--Display Title and options of the selected area-->
    <div class="bo_titles">
        <h2>Billets</h2>
        <div class="bo_options">
            <p><a href="index.php?action=boEditor"><i class="fas fa-i-cursor"></i>Créer</a></p>
            <p><i class="far fa-trash-alt"></i>Corbeille</p>
        </div>
    </div>

    <!--Display all the aviable texts-->
    <div class="bo_reader">
        <?php 
    
    while ($donnees = $rep->fetch()){?>

        <h3><?= htmlspecialchars ('Chapitre : ' . $donnees['chapter'] . ' - ' . $donnees['title'])?></h3>
        <div class="bo_postContent">
            <p><?= $donnees['content']?></p>
        </div>
        <div class="bo_postInfos">
            <p><?= htmlspecialchars ($donnees['author'])?></p>
            <p><?= htmlspecialchars ($donnees['date'])?></p>
        </div>
        <div class="bo_postOptions">
            <p>Visualiser</p>
            <p>Modifier</p>
            <a href="backoffice.php?delete_post=1">
                <p>Supprimer</p>
                <?php
            if(isset($_GET['delete_post'])){
                $req2 ->execute(array());
                header('location: backoffice.php');
            }
            ?>
            </a>
        </div>

        <?php }?>
    </div>
</div>

<?php require ('includes/menuEnd.php');?>
<?php require ('includes/footer.php');?>