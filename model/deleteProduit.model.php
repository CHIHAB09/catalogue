<?php
// supprimer un produit
function deleteProduit($db, $idproduit) {
    mysqli_begin_transaction($db);
    $sql = mysqli_query($db,"DELETE FROM produits_has_categorie WHERE produits_id = '$idproduit';");
    $sql1 = mysqli_query($db,"DELETE FROM produits WHERE idproduit = '$idproduit';");
    $sql2 = mysqli_query($db,"DELETE FROM images WHERE produits_idproduit = '$idproduit';");
    if($sql && $sql1&& $sql2){
        mysqli_commit($db);
        return true;
    }else{
        mysqli_rollback($db);
        return false;
    }
}
// supprimer un user