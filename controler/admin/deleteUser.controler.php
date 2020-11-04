<?php
require_once "../model/deleteCateg.model.php";


$user= selectsUserById($db,$iduser);

// on vérifie l'existence de la variable get id et que son contenu de type string ne contient que des numériques
if(isset($_GET['iduser'])&&ctype_digit($_GET['iduser'])){
    

    // conversion en entier
    $iduser = (int) $_GET['iduser'];

    // on confirme la suppression en rajoutant la variable get ok
    if(isset($_GET['ok'])){
        $delete = deleteUser ($db, $iduser);
       
        if ($delete){
            $erreur = "Suppression avec succes";
        } else {
            $erreur = "Suppression à échouée";
        }
        // redirection
        header("Location: ?pg=User&message=delete");
    }

// l'id n'existe pas ou n'est pas valide
}else{
    $erreur ="Ceci n'est pas le bon ID";

}
      

include "../view/admin/deleteUser.php";
