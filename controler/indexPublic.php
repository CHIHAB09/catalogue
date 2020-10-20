<?php
require_once "../model/crud.php";
require_once "../model/connectUsers.php";
require_once "../model/paginationModel.php";


//tentative de connexion
if(isset($_GET['pg'])&&$_GET['pg']=="connect"){

    //l'envoie du formulaire
    if(isset($_POST['pseudo'],$_POST['pwd'])){
        //tratiement des donnees
        $pseudo=htmlspecialchars(strip_tags(trim($_POST['pseudo'])),EN_QUOTES);
        $pwd=htmlspecialchars(strip_tags(trim($_POST['pseudo'])),EN_QUOTES);

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
             // view
        require_once "view/login.php";
        exit();
        }
       
        }
}

if(!isset($_GET['pg'])){
    include "../view/accueil.php";
}else{
    $pg=$_GET['pg'];

    switch($pg){
        case "Présentation":
            require_once "../view/presentation.php";
        break;
        case "Catalogue":
            require_once "../view/catalogue.php";
        break;
        case "Contact":
            require_once "../view/contacts.php";
        break;
        case "Login":
            require_once "../view/login2.php";
            break;
        default:
        require_once "../view/accueil.php";
    }
}