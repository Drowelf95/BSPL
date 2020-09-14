<?php require ('includes/header.php');?>
<?php require ('includes/menu.php');?>

<div class="bo_Container">

    <!--Display Title-->
    <div class="bo_titles">
        <h2>Profil</h2>
        <p>Vous pouvez modifier votre pseudonyme ainsi que votre mot de passe ici.</p>
    </div>

    <!--Display the text editor-->
    <div class="bo_editor">
    <form action="" method="POST">
        <div class="bo_fields">
            <h3>Pseudonyme :</h3>
            <input type="text" name="pseudo" class="fieldSizing" value=""
                placeholder="Nouveau pseudonyme" required>
        </div>

        <div class="bo_fields">
            <h3>Mot de passe :</h3>
            <input type="text" name="pass" class="fieldSizing" placeholder="Nouveau mot de passe" required>
        </div>

        <div class="bo_submit">
            <input type="submit" class="bo_btn" value="Enregistrer" name="save_profil">
        </div>
    </form>
    </div>
</div>

<?php require ('includes/menuEnd.php');?>
<?php require ('includes/footer.php');?>