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
    include "../view/public/errorConnexion.php";
    // stop working
    die();
}

if(isset($_SESSION['utilisateurs'])&& $_SESSION['utilisateurs']==session_id()){
    
    // si on est admin
    if($_SESSION['idUtilisateur']){
        require_once "../controler/indexAdmin.php";
        exit;
    } else {
        // chargement du contrôleur public si la condition n 'est pas valide
        require_once "../controler/indexPublic.php";
    }

}else{
     // chargement du contrôleur public si la condition n 'est pas valide
     require_once "../controler/indexPublic.php";
}
