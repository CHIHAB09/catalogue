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
        include "../controler/admin/accueil.admin.controler.php";
    }else{
        $pg=$_GET['pg'];

        switch($pg){
            case "Accueil":
                require_once "../controler/admin/accueil.admin.controler.php";
            break;
            case "Magasin":
                require_once "../controler/admin/accueil.Magasin.controler.php";
            break;
            case "insertMagasin":                
                require_once "../view/admin/insertMagasin.php";
            break;
            case "detailMagasin":                
                require_once "../view/admin/detailMagasin.php";
            break;
            case "updateMagasin":
                require_once "../view/admin/updateMagasin.php";
            break;
            case "deleteMagasin":
                require_once "../view/admin/deleteMagasin.php";
            break;
            case "Produit":
                require_once "../controler/admin/accueilProduit.controler.php";
            break;
            case "insertProduit":
                require_once "../controler/admin/insertProduit.controler.php";
            break;
            case "updateProduit":
                require_once "../controler/admin/updateProduit.controler.php";
            break;
            case "deleteProduit":
                require_once "../controler/admin/deleteProduit.controler.php";
            break;
            case "deconnexion":
                require_once "../controler/deconnexion.controler.php";
            break;
            
            default:            
            require_once "../controler/admin/accueil.admin.controler.php";
        }
    };
}  