<?php
require_once "../model/deleteCateg.model.php";


// on vérifie l'existence de la variable get id et que son contenu de type string ne contient que des numériques
if(isset($_GET['idcategorie'])&&ctype_digit($_GET['idcategorie'])){
    
    // conversion en entier
    $idcategorie = (int) $_GET['idcategorie'];
    $categ= selectCategorieByID($db,$idcategorie);

    // on confirme la suppression en rajoutant la variable get ok
    if(isset($_GET['ok'])){
        $delete = deleteCategorie ($db, $idcategorie);
       
        if ($delete){
            $erreur = "Suppression avec succes";
        } else {
            $erreur = "Suppression à échouée";
        }
        // redirection
        header("Location: ?pg=Categorie&message=delete");
    }

// l'id n'existe pas ou n'est pas valide
}else{
    $erreur ="Ceci n'est pas le bon ID";

}
      

include "../view/admin/deleteCateg.php";
