<?php
require_once "../model/deconnexion.php";
require_once "../model/crud.php";



// on veut se déconnecter
if(isset($_GET['pg'])&&$_GET['pg']=="deconnexion"){
    disconnectModel();
    header("Location: ./");
    exit;
}

//existence de la connexion valide login admin
if(isset($_SESSION['utilisateurs'])&& $_SESSION['utilisateurs']===session_id()) { 
    if(!isset($_GET['pg'])){
        include "../view/public/accueil.view.php";
    }else{
        $pg=$_GET['pg'];

        switch($pg){
            case "Magasin":
                require_once "../view/admin/accueil.Magasin.php";
            break;
            case "insertMagasin":
                require_once "../view/admin/insertMagasin.php";
            break;
            case "updateMagasin":
                require_once "../view/admin/updateMagasin.php";
            break;
            case "deleteMagasin":
                require_once "../view/admin/deleteMagasin.php";
            break;
            
            default:            
            require_once "../view/admin/accueilAdmin.php";
        }
    };
}  