<?php
require_once "../model/crud.php";
require_once "../model/connectUsers.php";
require_once "../model/paginationModel.php";


//tentative de connexion
if(isset($_GET['pg'])&&$_GET['pg']=="connect"){
    //l'envoie du formulaire
    if(isset($_POST['pseudo'],$_POST['pwd'])){
        //tratiement des donnees
        $pseudo=htmlspecialchars(strip_tags(trim($_POST['pseudo'])),ENT_QUOTES);
        $pwd=htmlspecialchars(strip_tags(trim($_POST['pwd'])),ENT_QUOTES);

        $connect= connectUser($db,$pseudo,$pwd);

     // connexion réussie
        if($connect){
            // création de la session
            $_SESSION = $connect; // on mets les variables récupérées via SQL de type tableau associatif dans le tableau de session
            $_SESSION['utilisateurs']=session_id();
            
            // redirection
            header("Location: ./");
            exit();
        }else{
            $erreur = "Login ou mot de passe incorrecte";
     
        }
       
        }
         // view
    require_once "../view/admin/accueilAdmin.php";
    exit();
}


if(!isset($_GET['pg'])){
    include "../view/public/accueil.view.php";
}else{
    $pg=$_GET['pg'];

    switch($pg){
        case "Présentation":
            require_once "../view/public/presentation.view.php";
        break;
        case "Catalogue":
            require_once "../view/public/catalogue.view.php";
        break;
        case "Contact":
            require_once "../view/public/contacts.view.php";
        break;
        case "Login":
            require_once "../view/public/login2.view.php";
            break;
            case "Deconnexion":
                require_once "../model/deconnexion.php";
            break;
        default:
        require_once "../view/public/accueil.view.php";
    }
}