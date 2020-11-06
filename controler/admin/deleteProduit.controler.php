<?php
require_once "../model/deleteProduit.model.php";
include "../view/admin/deleteProduit.php";


$produit="";

// on vérifie l'existence de la variable get id et que son contenu de type string ne contient que des numériques
if(isset($_GET['idproduit'])&&ctype_digit($_GET['idproduit'])){
    

    // conversion en entier
    $idproduit = (int) $_GET['idproduit'];

    // on confirme la suppression en rajoutant la variable get ok
    if(isset($_GET['ok'])){
        deleteProduit ($db, $idproduit);
        var_dump(deleteProduit ($db, $idproduit));
        // redirection
        //header("Location: ?pg=Produit&message=delete");
    }else{
        // préparation de la requête
        $sql = "SELECT modele, marque,prix FROM produits WHERE idproduit=$idproduit";
        // exécution de la requête
        $recup = mysqli_query($db,$sql) or die(mysqli_error($db));
        // si on trouve une ligne de résultat 1 vaut true
        if(mysqli_num_rows($recup)){
            $produit = mysqli_fetch_assoc($recup);
            // mysqli_num_rows($recup) vaut 0 donc false
        }else{
            $erreur = "Ce produit n'existe déjà plus!";
        }
    
    }

// l'id n'existe pas ou n'est pas valide
}else{
    $erreur ="Ceci n'est pas le bon ID";

}
        