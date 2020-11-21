<?php
require_once "../model/deconnexion.php";
require_once "../model/crud.php";
require_once "../view/admin/parts/navBarAdmin.php";
/*require_once "../model/categorieModel.php";
require_once "../model/produitModel.php";
require_once "../model/imageModel.php";*/




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
                require_once "../controler/admin/insertMagasin.controler.php";
            break;
            case "detailMagasin":                
                require_once "../controler/admin/detailMagasin.controler.php";
            break;
            case "updateMagasin":
                require_once "../controler/admin/updateMagasin.controler.php";
            break;
            case "deleteMagasin":
                require_once "../controler/admin/deleteMagasin.controler.php";
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
            case "detailProduit":                
                require_once "../controler/admin/detailProduit.controler.php";
            break;
            case "deconnexion":
                require_once "../controler/deconnexion.controler.php";
            break;
            case "Categorie":
                require_once "../controler/admin/accueilCateg.controler.php";
            break;
            case "updateCateg":
                require_once "../controler/admin/updateCateg.controler.php";
            break;
            case "deleteCateg":
                require_once "../controler/admin/deleteCateg.controler.php";
            break;
            case "insertCateg":
                require_once "../controler/admin/insertCateg.controler.php";
            break;
            case "detailCateg":                
                require_once "../controler/admin/detailCateg.controler.php";
            break;
            case "Image":
                require_once "../controler/admin/accueilImage.controler.php";
            break;
            case "insertImage":
                require_once "../controler/admin/insertImage.controler.php";
            break;
            case "detailImage":                
                require_once "../controler/admin/detailImage.controler.php";
            break;
            case "deleteImage":
                require_once "../controler/admin/deleteImage.controler.php";
            break;
            case "updateImage":
                require_once "../controler/admin/updateImage.controler.php";
            break;
            case "Promo":
                require_once "../controler/admin/accueilPromo.controler.php";
            break;
            case "insertPromo":
                require_once "../controler/admin/insertPromo.controler.php";
            break;
            case "deletePromo":
                require_once "../controler/admin/deletePromo.controler.php";
            break;
            case "updatePromo":
                require_once "../controler/admin/updatePromo.controler.php";
            break;
            case "detailPromo":
                require_once "../controler/admin/detailPromo.controler.php";
            break;
            
            default:            
            require_once "../controler/admin/accueil.admin.controler.php";
        }
    }
}
//require_once "../view/admin/parts/footer.php";