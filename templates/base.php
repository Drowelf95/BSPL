<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?></title>

    <link rel="stylesheet" href="<?php echo $styling ?>"/>
    <link rel="stylesheet" href="<?php echo $fontAwe ?>"/>
    <link rel="stylesheet" href="<?php echo $mediaq ?>"/>
    <link rel="icon" href="<?php echo $favIco ?>" />
</head>
<body>
    <div id="content">
        <?php echo $content ?>
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