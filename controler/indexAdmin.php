<?php
require_once "../model/deconnexion.php";
require_once "../model/crud.php";
/*require_once "../model/categorieModel.php";
require_once "../model/produitModel.php";
require_once "../model/imageModel.php";*/




// on veut se déconnecter
if(isset($_GET['pg'])&&$_GET['pg']=="deconnexion"){
    disconnectModel();
    header("Location: ./");
    exit;
}
/*
// si on est sur le détail d'un article
if(isset($_GET["detailProduit"])){
    // conversion en int, vaut 0 si la conversion échoue
    $idproduit = (int) $_GET["detailProduit"];
    // si la convertion échoue redirection sur l'accueil
    if(!$idproduit) {
        header("Location: ./");
        exit();
    }
    // appel de la fonction du modèle produitModel.php
    $recup = produitLoadFull($db,$idproduit);

    // pas d'article, la page n'existe pas
    if(!$recup){
        $erreur = "Ce produit n'existe plus";
    }

    // controler
    require_once "../controler/admin/detailProduit.php";
    exit();

}

// on a cliqué sur ajouter un produit

if(isset($_GET['pg'])&&$_GET['pg']=="insert"){

    // si on a envoyé le formulaire (toutes les variables POST attendues existent)
    if(isset($_POST['modele'],$_POST['produitEvident'],$_POST['marque'],$_POST['descriptif'],$_POST['prix'])){

        //var_dump($_POST);
        //exit();

        // traitement des variables
        $model= htmlspecialchars(strip_tags(trim($_POST['modele'])),ENT_QUOTES);
        $produit_evident= (int) $_POST['produit_evident'];
        $marque= htmlspecialchars(strip_tags(trim($_POST['modele'])),ENT_QUOTES);
        // exception pour le strip_tags qui va accepter
        $descriptif= htmlspecialchars(strip_tags(trim($_POST['descritif']),'<p><br><a><img><h4><h5><b><strong><i><ul><li>'),ENT_QUOTES);
        $prix= (int) $_POST['prix'];

        // si un des champs est vide (n'a pas réussi la validation des variables POST)
        if(empty($model)||!isset($produit_evident)||empty($marque)||empty($descriptif)||empty($prix)){
            $erreur = "Format des champs non valides";
        }else{
            // insertion de produit avec récupération de son id
            $insert = insertProduit($db,$model,$produitEvident,$marque,$descriptif,$prix);

            // insertion réussie (un id et pas false)
            if($insert){

                // si on a coché au moins une rubrique (existence de idrubriques)
                if(isset($_POST['idcategorie'])){

                    insertLinkProduitWithCateg($db,$insert,$_POST['idcategorie']);

                }


                // si on veut y ajouter une image
                if(!empty($_FILES['URL'])){
                    $upload = theimagesUpload($_FILES['URL'],IMG_FORMAT,IMG_MAX_SIZE,IMG_UPLOAD_ORIGINAL,IMG_UPLOAD_MEDIUM,IMG_UPLOAD_SMALL,IMG_MEDIUM_WIDTH,IMG_MEDIUM_HEIGHT,IMG_SMALL_WIDTH,IMG_SMALL_HEIGHT,IMG_JPG_MEDIUM,IMG_JPG_SMALL);

                    // l'image a bien été envoyée, donc on obtient un tableau
                    if(is_array($upload)){
                        // on insert l'image (et on récupère l'id de l'image)
                        $idimage = theimagesInsert($db,$_POST['legend'],$upload[0],$insert);

                    // en cas d'erreur (string)
                    }else{
                        $error = $upload;
                    }
                }
                header("Location: ./");
                exit;
            }else{

                $erreur ="Problème lors de l'insertion";
            }

        }
    }

    // on récupère toutes les rubriques potentielles
    $recup_categs = recupAllRubriques($db);

    require_once "../controler/admin/insertProduit.php";
    //var_dump($_POST);
    exit();
}

// on a cliqué sur supprimer un produit

if(isset($_GET['pg'])&&$_GET['p']=="delete"){

    // si la variable d'id existe et est une chaîne de caractère ne contenant qu'un entier positif non signé
    if(isset($_GET['idproduit'])&&ctype_digit($_GET['idproduit'])){
        // conversion en numérique entier
        $id = (int) $_GET['idproduit'];

        // on récupère l'article en question
        $recup =produitLoadFull($db,$idproduit);

        // pas de récupération
        if(!$recup){
            $erreur = "Produit introuvable";
        }else{
            $model = $recup['model'];
            $marque = $recup['marque'];
            // on clique sur confirmation de suppression
            if(isset($_GET['ok'])){
                // on tente de supprimer l'article
                if(deleteProduit($db,$idproduit)){
                    $erreur="Suppression effectuée, vous allez être rédirigé dans 3 secondes <script>setTimeout(function(){ document.location.href = './' }, 3000);</script>";
                }else{
                    $erreur="Echec de la suppression, erreur inconnue, Veuillez recommencer!";
                }
            }

        }


    }else{
        $erreur = "Format de l'id non valable";
    }


    require_once "../controler/admin/deleteProduit.php";
    //var_dump($_POST);
    exit();
}
// on a cliqué sur mettre à jour un produit

if(isset($_GET['pg'])&&$_GET['pg']=="update"){


    // si la variable d'id existe et est une chaîne de caractère ne contenant qu'un entier positif non signé
    if(isset($_GET['idproduit'])&&ctype_digit($_GET['idproduit'])){
        // conversion en numérique entier
        $idproduit = (int) $_GET['idproduit'];

        // si on clique pour supprimer une image
        if(isset($_GET['delIMG'])&&ctype_digit($_GET['delIMG'])){
            // on supprime l'image de la DB
            $deleteIMG = theimagesDelete($db,$_GET['delIMG'],$_GET['name']);

            // si la suppression de la DB a fonctionnée
            if($deleteIMG){
                // on supprime physiquement les images
                theimagesUnlink([IMG_UPLOAD_ORIGINAL,IMG_UPLOAD_MEDIUM,IMG_UPLOAD_SMALL],$_GET['name']);
            }
            header("Location: ?p=update&id=$id");
            exit();
        }


        // si le formualaire est envoyé
        if(isset($_POST['users_idusers'])){

            //var_dump($_POST);
            $update = updateArticle($db,$_POST,$id);

            // si l'update a eu lieue
            if($update){
                // Pour les rubriques, lors d'un update, on supprime toujours les rubriques pour l'article, elles seront remplacées ci-dessous par les nouvelles rubriques
                deleteLinkArticlesWithRubriques($db,$id);

                    // Si il existe au moins une rubrique cochée
                    if(isset($_POST['idrubriques'])) {
                        // ajout de toutes les rubriques
                        insertLinkArticlesWithRubriques($db, $id,$_POST['idrubriques']);
                    }
                // si on veut y ajouter une image
                if(!empty($_FILES['theimages_name'])){
                    $upload = theimagesUpload($_FILES['theimages_name'],IMG_FORMAT,IMG_MAX_SIZE,IMG_UPLOAD_ORIGINAL,IMG_UPLOAD_MEDIUM,IMG_UPLOAD_SMALL,IMG_MEDIUM_WIDTH,IMG_MEDIUM_HEIGHT,IMG_SMALL_WIDTH,IMG_SMALL_HEIGHT,IMG_JPG_MEDIUM,IMG_JPG_SMALL);

                    // l'image a bien été envoyée
                    if(is_array($upload)){
                        // on insert l'image (et on récupère l'id de l'image)
                        $idtheimages = theimagesInsert($db,$_POST['theimages_title'],$upload[0],$update);

                    }else{
                        $error = $upload;
                    }
                }
                header("Location: ./?detailArticle=$id");
                exit();
            }
            $erreur = $update;

        }


        // chargement pour la vue

        // on récupère l'article en question avec ses images
        $recupArticle = articleLoadFull($db,$id);
        // on récupères les rubriques dont l'article fait partie
        $recupRubrique = recupRubriquesByIdFromArticle($db,$id);
        // on récupère tous les auteurs
        $recupUsers = AllUser($db);
        // on récupère toutes les rubriques potentielles
        $recupCategs = recupAllRubriques($db);


    }else{
        $erreur = "Format de l'id non valable";
    }


    require_once "../controler/admin/adminUpdateArticlecontroler.php";
    //var_dump($_POST);
    exit();
}
*/
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
            /*case "deleteMagasin":
                require_once "../controler/admin/deleteMagasin.controler.php";
            break;*/
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
    };
}  