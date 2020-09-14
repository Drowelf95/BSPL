<div class="bo_Container">

    <!--Display Title and options of the selected area-->
    <div class="bo_titles">
        <h2>Billets</h2>
        <div class="bo_options">
            <p><a href="index.php?action=boEditor"><i class="fas fa-i-cursor"></i>Créer</a></p>
            <p><a href="index.php?action=boTrash"><i class="far fa-trash-alt"></i>Corbeille</a></p>
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
            <p><?= htmlspecialchars ($donnees['date_crea'])?></p>
        </div>
        <div class="bo_postOptions">
            <p>Visualiser</p>
            <p>Modifier</p>
            <p>Supprimer</p>
            </a>
        </div>

        <?php }?>
    </div>
</div>