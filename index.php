<?php

// ouverture de session
session_start();

//appel des models qu on a besoin
require_once "public/config.php";
require_once "model/connectDB.php";



//connexion à la db.
$db = connectDB();

// connect error
if(!$db){
    // vue  connect error
    include "view/errorConnectView.php";
    // stop working
    die();
}
// verification de l identifiant pour donne rl autorisation de connexion
if(isset($_SESSION['utilisateurs'])&&$_SESSION['utilisateurs']==session_id()){
    // si on est admin
    if($_SESSION['id']==1){
        require_once "controller/indexAdmin.php";
        exit;
    }

}
// chaargement du contrôleur public si la condition n 'est pas valide
require_once "controler/indexPublic.php";




