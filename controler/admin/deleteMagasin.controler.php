<?php
require_once "../model/deleteMagasin.model.php";
require_once "../model/paginationModel.php";


// on vérifie l'existence de la variable get id et que son contenu de type string ne contient que des numériques
if(isset($_GET['idMagasin'])&&ctype_digit($_GET['idMagasin'])){
    // conversion en entier
    $idMagasin = (int) $_GET['idMagasin'];

    // on confirme la suppression en rajoutant la variable get ok
    if(isset($_GET['ok'])){
        deleteMagasin ($db, $idMagasin);
   
        // redirection
        header("Location: ?pg=Magasin&message=delete");
    }else{
        // préparation de la requête
        $sql = "SELECT nom, rue,codepostal FROM magasin WHERE idMagasin=$idMagasin";
        // exécution de la requête
        $recup = mysqli_query($db,$sql) or die(mysqli_error($db));
        // si on trouve une ligne de résultat 1 vaut true
        if(mysqli_num_rows($recup)){
            $magasin = mysqli_fetch_assoc($recup);
            // mysqli_num_rows($recup) vaut 0 donc false
        }else{
            $erreur = "Ce magasin n'existe déjà plus!";
        }
    
    }

// l'id n'existe pas ou n'est pas valide
}else{
    $erreur ="Ceci n'est pas le bon ID";

}

include "../view/admin/deleteMagasin.php";