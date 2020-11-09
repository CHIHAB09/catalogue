<?php
require_once "../model/detailPromo.model.php";

if(isset($_GET['idpromotion'])&&ctype_digit($_GET["idpromotion"])){
    
    // on traîte idproduit en le transformant en entier si faux 0 => empty
    $idpromotion = (int) $_GET['idpromotion'];
    // requête permettant de récupérer le contenu dans la base de donnée
    $promo = selectsPromoById($db,$idpromotion);
    //var_dump($promo);
}else{
    $erreur = "Cet contenu n'existe déjà plus!";
}












include "../view/admin/detailPromo.php";