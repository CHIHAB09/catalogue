<?php
require_once "../model/detailProduit.model.php";
if(isset($_GET['idproduit'])&&ctype_digit($_GET["idproduit"])){
    // on traîte idproduit en le transformant en entier si faux 0 => empty
    $idproduit = (int) $_GET['idproduit'];
    // requête permettant de récupérer le contenu dans la base de donnée
    $produit = selectsAllProduitsById($db,$idproduit);
    //var_dump($produit);  
    
}else{
    $erreur = "Cet contenu n'existe déjà plus!";
}

include "../view/admin/detailProduit.php";