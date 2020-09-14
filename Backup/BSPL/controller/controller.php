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

    $logoff = logoff();
    $auto_log = auto_loggin();
    $req = test_loggin();

    require('view/formulaireView.php');
}

function backOffice ()
{
    require('model/boReaderModel.php');

    $auto_log = auto_loggin();
    $rep = display_active();

    require('view/boReaderView.php');
}

function boEditor ()
{
    require('model/boEditorModel.php');

    $auto_log = auto_loggin();

    require('view/boEditorView.php');
}

function boTrash ()
{
    require('model/boTrashModel.php');

    $auto_log = auto_loggin();
    $repDel = display_del();

    require('view/boTrashView.php');
}

function boProfil ()
{
    require('model/boProfilModel.php');

    $auto_log = auto_loggin();

    require('view/boProfilView.php');
}