<div class="bo_postManager">

    <!--Display Title and options of the selected area-->
    <div class="bo_titles">
        <h2>Billets</h2>
        <div class="bo_options">
            <p class="js_Build"><i class="fas fa-i-cursor"></i>Créer</p>
            <p class="js_Trash"><i class="far fa-trash-alt"></i>Corbeille</p>
            <p class="js_Return dispNone"><i class="fas fa-long-arrow-alt-left"></i>Retour</p>
        </div>
    </div>

    <!--Display the text editor-->
    <div class="bo_editor dispNone">
        <form action="" method="POST">
            <div class="bo_fields">
                <h3>Chapitre :</h3>
                <input type="text" name="chapter" class="fieldSizing" placeholder="Numéro du chapitre ici" required>
            </div>

            <div class="bo_fields">
                <h3>Titre :</h3>
                <input type="text" name="title" class="fieldSizing" placeholder="Votre titre ici" required>
            </div>

            <div class="bo_fields">
                <h3>Votre contenu :</h3>
                <textarea id="mytextarea" name="mytextarea" placeholder="Un nouveau chapitre!"></textarea>
            </div>

            <div class="bo_fields">
                <h3>Auteur :</h3>
                <input type="text" name="author" class="fieldSizing" value="Jean Foreteroche" required>
            </div>

            <div class="bo_submit">
                <input type="submit" class="bo_btn" value="Enregister" name="save_edit">
                <p class="bo_date">date : <?php 
                setlocale(LC_TIME, "fr_FR");
                echo strftime('%A le %d %B %Y'); ?></p>
            </div>

            <?php 
            if(isset($_POST['save_edit'])){
            include ("colink.php");
            $requete = $dbh ->prepare('INSERT INTO bills(author, chapter, title, content, deleted) VALUES(?, ?, ?, ?, false)');
            $requete ->execute(array($_POST['author'],$_POST['chapter'], $_POST['title'], $_POST['mytextarea'], ));
            header('location: backoffice.php');
            }?>
        </form>
    </div>

    <!--Display all the aviable texts-->
    <div class="bo_reader">
        <?php 
        include ("colink.php");
        $response = $dbh ->query('SELECT * FROM bills WHERE deleted=0');
        while ($donnees = $response->fetch())
        {
        $id = $donnees['id'];
        $chapter = $donnees['chapter'];
        $title = $donnees['title'];
        $content = $donnees['content'];
        $author = $donnees['author'];
        $date = $donnees['date'];
        ?>

        <h3><?php echo htmlspecialchars ('Chapitre : ' . $chapter . ' - ' . $title);?></h3>
        <div class="bo_postContent">
            <p><?php echo $content;?></p>
        </div>
        <div class="bo_postInfos">
            <p><?php echo htmlspecialchars ($author);?></p>
            <p><?php echo htmlspecialchars ($date);?></p>
        </div>
        <div class="bo_postOptions">
            <p>Visualiser</p>
            <p>Modifier</p>
            <a href ="backoffice.php?delete_post=1">
            <p>Supprimer</p>
            <?php
            if(isset($_GET['delete_post'])){
                include ("colink.php");
                $requete = $dbh ->prepare('INSERT INTO bills(id, deleted) VALUES($id, true)');
                $requete ->execute(array());
                header('location: backoffice.php');
            }    
            ?>
            </a>
        </div>

        <?php }?>
    </div>

    <!--Display trash-->
    <div class="bo_trash dispNone">
        <?php 
        include ("colink.php");
        $response = $dbh ->query('SELECT * FROM bills WHERE deleted=1');
        while ($donnees = $response->fetch())
        {
        $chapter = $donnees['chapter'];
        $title = $donnees['title'];
        $content = $donnees['content'];
        $author = $donnees['author'];
        $date = $donnees['date'];
        ?>

        <h3><?php echo htmlspecialchars('Chapitre : ' . $chapter . ' - ' . $title);?></h3>
        <div class="bo_postContent">
            <p><?php echo $content;?></p>
        </div>
        <div class="bo_postInfos">
            <p><?php echo htmlspecialchars ($author);?></p>
            <p><?php echo htmlspecialchars ($date);?></p>
        </div>
        <div class="bo_postOptions">
            <p>Visualiser</p>
            <p>Supprimer</p>
        </div>

        <?php }?>
    </div>

</div>