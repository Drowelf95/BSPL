<div class="bo_postManager">

    <!--Display Title and options of the selected area-->
    <div class="bo_titles">
        <h2>Billets</h2>
        <div class="bo_options">
            <p class="js_Build"><i class="fas fa-i-cursor"></i>Créer</p>
            <p class="js_Trash" ><i class="far fa-trash-alt"></i>Corbeille</p>
            <p class="js_Return dispNone"><i class="fas fa-long-arrow-alt-left"></i>Retour</p>
        </div>
    </div>

    <!--Display the text editor-->
    <div class="bo_editor dispNone">
        <form action="process2.php" method="post">

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
                <input type="submit" class="bo_btn" value="Enregister">
                <p class="bo_date">date : <?php 
                setlocale(LC_TIME, "fr_FR");
                echo strftime('%A le %d %B %Y'); ?></p>
            </div>
        </form>
    </div>

    <!--Display all the aviable texts-->

    <div class="bo_reader">
        <?php 

$host_name = 'db5000822621.hosting-data.io';
$database = 'dbs728662';
$user_name = 'dbu673427';
$password = 'Ple@seG1veM3in#1412';
$dbh = null;

try {
$dbh = new PDO("mysql:host=$host_name; dbname=$database;", $user_name, $password);
} catch (PDOException $e) {
echo "Erreur!: " . $e->getMessage() . "<br/>";
die();
}

$response = $dbh ->query('SELECT * FROM bills');
while ($donnees = $response->fetch())
{
$chapter = $donnees['chapter'];
$title = $donnees['title'];
$content = $donnees['content'];
$author = $donnees['author'];
$date = $donnees['date'];

?>


        <h3><?php echo 'Chapitre : ' . $chapter . ' - ' . $title;?></h3>
        <div class="bo_postContent">
            <p><?php echo $content;?></p>
        </div>
        <div class="bo_postInfos">
            <p><?php echo $author;?></p>
            <p><?php echo $date;?></p>
        </div>
        <div class="bo_postOptions">
            <p>Visualiser</p>
            <p>Modifier</p>
            <p>Supprimer</p>
        </div>


        <?php }?>
    </div>

</div>