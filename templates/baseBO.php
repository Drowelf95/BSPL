<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?php echo $title ?></title>

    <link rel="stylesheet" href="<?php echo $styling ?>" />
    <link rel="stylesheet" href="<?php echo $fontAwe ?>" />
    <link rel="stylesheet" href="<?php echo $mediaq ?>" />
    <link rel="icon" href="<?php echo $favIco ?>" />
</head>

<body>
    <div class="dispFlex loadingPage">
        <div class="masterContainer">

            <div class="dispFlex bo_menu">

                <div class="dispFlex bo_menu_group">


                    <?php $active = $this->session->get('page');?>

                    <a href="index.php">
                        <div class="bo_m_btn">
                            <p><i class="fas fa-home"></i></p>
                            <p>Accueil</p>
                        </div>
                    </a>

                    <a href="index.php?path=backOffice">
                        <?php if($active !== 'billets') : ?>
                            <div class="bo_m_btn">
                        <?php else : ?>
                            <div class=" bo_m_btn bo_m_btn_active">
                        <?php endif ?>
                            <p><i class="far fa-edit"></i></p>
                            <p>Billets</p>
                        </div>
                    </a>

                    <a href="index.php?path=comments">
                        <?php if($active !== 'commentaires') : ?>
                            <div class="bo_m_btn">
                        <?php else : ?>
                            <div class=" bo_m_btn bo_m_btn_active">
                        <?php endif ?>
                            <p><i class="far fa-comments"></i></p>
                            <p>Commentaires</p>
                        </div>
                    </a>

                    <a href="index.php?path=profil">
                        <?php if($active !== 'profil') : ?>
                            <div class="bo_m_btn">
                        <?php else : ?>
                            <div class=" bo_m_btn bo_m_btn_active">
                        <?php endif ?>
                            <p><i class="far fa-user-circle"></i></p>
                            <p>Profil</p>
                        </div>
                    </a>

                    <div class="bo_m_btn bo_logOut">
                        <p><i class="fas fa-sign-out-alt"></i></p>
                        <p>Quitter</p>
                    </div>
                </div>

                <div class="dispFlex bo_menu_quit">
                    <div class="logout_Conf dispNone">
                        <p>Souhaitez vous réellement quitter ?</p>
                        <div class="logout_confBtn">
                            <a href="index.php?path=logoutConf">
                                <p class="conf_Yes">Oui</p>
                            </a>
                            <p class="conf_No">Non</p>
                        </div>
                    </div>
                </div>

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
        plugins : 'autoresize',
        width: '100%'
    });

    $(document).ready(function(e) {
        const Initbehavior = new behavior();
    });
    </script>

</body>

</html>