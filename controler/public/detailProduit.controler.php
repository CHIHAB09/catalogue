<?php
require_once "../model/public/detailProduit.model.php";

if(isset($_GET['idproduit'])&&ctype_digit($_GET['idproduit'])){
    $idproduit= (int) $_GET['idproduit'];
    $detailProduits= selectsProduitById($db,$idproduit);

}
//var_dump($detailProduit);

include "../view/public/detailProduit.php";