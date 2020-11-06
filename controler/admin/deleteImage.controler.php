<?php
require_once "../model/deleteImage.model.php";




// on vérifie l'existence de la variable get id et que son contenu de type string ne contient que des numériques
if(isset($_GET['idimage'])&&ctype_digit($_GET['idimage'])){
    

    // conversion en entier
    $idimage = (int) $_GET['idimage'];
    $image= selectsImageByID($db,$idimage);
    
    // on confirme la suppression en rajoutant la variable get ok
    if(isset($_GET['ok'])){
        $delete = deleteImage($db, $idimage);
       
        if (!$delete){
            $erreur = "Suppression à échouée";
        } 
        // redirection
        header("Location: ?pg=Image&message=delete");
    }

// l'id n'existe pas ou n'est pas valide
}else{
    $erreur ="Ceci n'est pas le bon ID";

}
      

include "../view/admin/deleteImage.php";
