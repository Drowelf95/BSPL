<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title><?= $title ?></title>

    <link rel="stylesheet" href="<?= $styling ?>" />
    <link rel="stylesheet" href="<?= $fontAwe ?>" />
    <link rel="stylesheet" href="<?= $mediaq ?>" />
</head>

<body>

    <div class="dispFlex loadingPage">

        <div class="masterContainer">

            <div class="dispFlex bo_menu">

                <a href="index.php"><img src="../public/img/iceberg.png" alt=""></a>


                <a href="index.php?action=backOffice">
                    <div class="bo_m_btn test">
                        <p><i class="far fa-edit"></i></p>
                        <p>Billets</p>
                    </div>
                </a>

                <div class="bo_m_btn">
                    <p><i class="far fa-comments"></i></p>
                    <p>Commentaires</p>
                </div>

                <a href="index.php?action=boProfil">
                    <div class="bo_m_btn">
                        <p><i class="far fa-user-circle"></i></p>
                        <p>Profil</p>
                    </div>
                </a>

                <a href="index.php?action=formulaire&loggin=0">
                    <div class="bo_m_btn">
                        <p><i class="fas fa-sign-out-alt"></i></p>
                        <p>Quitter</p>
                    </div>
                </a>
            </div>

            <?= $content ?>

        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/asyd3agz15pznlswi8v2543hqq6x6g1w7cambqah76u7bpiv/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"
        integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="assets/js/backoffice.js"></script>

    <script>
    tinymce.init({
        selector: '#mytextarea',
        width: '600',
        height: '250'
    });
    </script>

</body>
</html>