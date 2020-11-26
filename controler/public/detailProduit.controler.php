<?php
require_once "../model/public/detailProduit.model.php";

if(isset($_GET['idproduit'])&&ctype_digit($_GET['idproduit'])){
    $idproduit= (int) $_GET['idproduit'];
    $detailProduit= selectsProduitById($db,$idproduit);

    if(!$detailProduit){
        $erreur= "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }else{
        $detailImages= explode('||',$detailProduit['images']);
    }


}
//var_dump($detailProduit);

include "../view/public/detailProduit.php";