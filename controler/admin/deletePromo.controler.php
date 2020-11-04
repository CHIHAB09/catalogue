<?php
require_once "../model/deletePromo.model.php";




// on vérifie l'existence de la variable get id et que son contenu de type string ne contient que des numériques
if(isset($_GET['idpromotion'])&&ctype_digit($_GET['idpromotion'])){
    

    // conversion en entier
    $idpromotion = (int) $_GET['idpromotion'];
    $promo= selectsPromoById($db,$idpromotion);

    // on confirme la suppression en rajoutant la variable get ok
    if(isset($_GET['ok'])){
        $delete = deletePromo($db, $idpromotion);
       
        if (!$delete){
            $erreur = "Suppression à échouée";
        } 
        // redirection
        header("Location: ?pg=Promo&message=delete");
    }

// l'id n'existe pas ou n'est pas valide
}else{
    $erreur ="Ceci n'est pas le bon ID";

}
      

include "../view/admin/deletePromo.php";
