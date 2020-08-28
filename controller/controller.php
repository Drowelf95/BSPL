<?php 

function frontPage ()
{
    require('model/frontPageModel.php');

    //Do something

    require('view/frontPageView.php');
}

function formulaire ()
{
    require('model/formulaireModel.php');

    $auto_log = auto_loggin();
    $log = test_loggin();
    $log_error = error_loggin();

    require('view/formulaireView.php');
}

function backOffice ()
{
    require('model/boReaderModel.php');

    $rep = display_active();

    require('view/boReaderView.php');
}

function boEditor ()
{
    require('model/boEditorModel.php');

    //Do something

    require('view/boEditorView.php');
}
