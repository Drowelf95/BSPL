<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title><?php echo $title ?></title>

    <link rel="stylesheet" href="<?= $styling ?>" />
    <link rel="stylesheet" href="<?= $fontAwe ?>" />
    <link rel="stylesheet" href="<?= $mediaq ?>" />
    <link rel="icon" href="<?= $favIco ?>" />
</head>

<body>
    <div class="dispFlex loadingPage">
        <div class="masterContainer">

            <div class="dispFlex bo_menu">

                <a href="index.php">
                    <div class="bo_m_btn">
                        <p><img src="../public/img/iceberg.png" alt=""></p>
                        <p>Accueil</p>
                    </div>
                </a>

                <a href="index.php?path=backOffice">
                    <div class="bo_m_btn">
                        <p><i class="far fa-edit"></i></p>
                        <p>Billets</p>
                    </div>
                </a>

                <a href="index.php?path=comments">
                    <div class="bo_m_btn">
                        <p><i class="far fa-comments"></i></p>
                        <p>Commentaires</p>
                    </div>
                </a>

                <a href="index.php?path=profil">
                    <div class="bo_m_btn">
                        <p><i class="far fa-user-circle"></i></p>
                        <p>Profil</p>
                    </div>
                </a>

                <a href="index.php?path=logOut">
                    <div class="bo_m_btn">
                        <p><i class="fas fa-sign-out-alt"></i></p>
                        <p>Quitter</p>
                    </div>
                </a>

                <?php if ($this->session->get('loginOut')) {?>
                <div class="logout_Conf">
                    <p>Souhaitez vous réellement quitter ?</p>
                    <div class="logout_confBtn">
                        <a href="index.php?path=logoutConf">
                            <p class="conf_Yes">Oui</p>
                        </a>
                        <a href="index.php?path=logoutCancel">
                            <p class="conf_No">Non</p>
                        </a>
                    </div>
                </div>
                <?php };?>

            </div>

            <div class="bo_subContainer">
                <?php echo $content ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/asyd3agz15pznlswi8v2543hqq6x6g1w7cambqah76u7bpiv/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"
        integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="<?php echo $myJs ?>"></script>

    <script>
    tinymce.init({
        selector: '#mytextarea',
        width: '600',
        height: '250'
    });

    $(document).ready(function(e) {
        const Initbehavior = new behavior();
    });
    </script>

</body>

</html>