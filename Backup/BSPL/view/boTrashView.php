<?php require ('includes/header.php');?>
<?php require ('includes/menu.php');?>

<div class="bo_Container">

    <!--Display Title and options of the selected area-->
    <div class="bo_titles">
        <h2>Billets</h2>
        <div class="bo_options">
            <p><a href="index.php?action=backOffice"><i class="fas fa-long-arrow-alt-left"></i>Retour</a></p>
            <p><a href="index.php?action=boEditor"><i class="fas fa-i-cursor"></i>Créer</a></p>
        </div>
    </div>

        <!--Display trash-->
    <div class="bo_trash">
        <?php 
        
        while ($donnees = $repDel->fetch()){?>

        <h3><?= htmlspecialchars('Chapitre : ' . $donnees['chapter'] . ' - ' . $donnees['title'])?></h3>
        <div class="bo_postContent">
            <p><?= $donnees['content']?></p>
        </div>
        <div class="bo_postInfos">
            <p><?= htmlspecialchars ($donnees['author'])?></p>
            <p><?= htmlspecialchars ($donnees['date_crea'])?></p>
        </div>
        <div class="bo_postOptions">
            <p>Visualiser</p>
            <p>Supprimer</p>
        </div>

        <?php }?>
    </div>
</div>

<?php require ('includes/menuEnd.php');?>
<?php require ('includes/footer.php');?>