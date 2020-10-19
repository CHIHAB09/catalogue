<?php
require_once "model/crud.php";
require_once "model/connectUsers.php";
require_once "model/paginationModel.php";

//tentative de connexion
if(isset($_GET['p'])&&$_GET['p']=="connect"){

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
            //var_dump($_SESSION);

            // redirection
            header("Location: ./");
            exit();
        }else{
            $erreur = "Login ou mot de passe incorrecte";
        }
        // view
        require_once "view/login.php";
        exit();
        }
}