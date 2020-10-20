<?php

// ouverture de session
session_start();

//appel des models qu on a besoin
require_once "../bin/config.php";
require_once "../model/connectDB.php";



//connexion à la db.
$db = connectDB();

// connect error
if(!$db){
    // vue  connect error
    include "../view/errorConnexion.php";
    // stop working
    die();
}

    // si on est admin
    if($_SESSION['id']==1){
        require_once "../controler/indexAdmin.php";
        exit;
    }else{
        // chargement du contrôleur public si la condition n 'est pas valide
        require_once "../controler/indexPublic.php";

}


