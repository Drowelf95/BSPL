<?php 

require('controller/controller.php');

if(isset($_GET['action'])) {
    if($_GET['action'] == 'formulaire') {
            formulaire();
    }
}

if(isset($_GET['action'])) {
    if($_GET['action'] == 'backOffice') {
        backOffice();
    }
}

if(isset($_GET['action'])) {
    if($_GET['action'] == 'boEditor') {
        boEditor();
    }
}

if(isset($_GET['action'])) {
    if($_GET['action'] == 'boTrash') {
        boTrash();
    }
}

if(isset($_GET['action'])) {
    if($_GET['action'] == 'boProfil') {
        boProfil();
    }
}

else {
    frontPage();
}