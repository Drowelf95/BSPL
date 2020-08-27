<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="assets/img/fire.png" />
    <title>BSPL - Blog admin</title>

    <link href="assets/fonts/Fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/mediaq.css" />
</head>

<body>

    <div class="dispFlex loadingPage">

        <div class="masterContainer">

            <div class="dispFlex bo_menu">

                <a href="index.html"><img src="assets/img/iceberg.png" alt=""></a>

                <div class="bo_m_btn test">
                    <p><i class="far fa-edit"></i></p>
                    <p>Billets</p>
                </div>

                <div class="bo_m_btn">
                    <p><i class="far fa-comments"></i></p>
                    <p>Commentaires</p>
                </div>

                <div class="bo_m_btn">
                    <p><i class="far fa-user-circle"></i></p>
                    <p>Profil</p>
                </div>

                <div class="bo_m_btn">
                    <a href="logoff.php">
                        <p><i class="fas fa-sign-out-alt"></i></p>
                        <p>Quitter</p>
                    </a>
                </div>
            </div>

            <div class="bo_Container">
                <?php include ("postmanager.php");?>
            </div>

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

    $(document).ready(function(e) {
        const Initbackoffice = new backOffice();
    });
    </script>


</body>

</html>