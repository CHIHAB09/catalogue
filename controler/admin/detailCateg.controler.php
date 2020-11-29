<?php
require_once "../model/detailCateg.model.php";

$titre= "Categorie";


if(isset($_GET['idcategorie'])&&ctype_digit($_GET["idcategorie"])){
    // on traîte idproduit en le transformant en entier si faux 0 => empty
    $idcategorie = (int) $_GET['idcategorie'];
    // requête permettant de récupérer le contenu dans la base de donnée
    $categ = selectCategorieByID($db,$idcategorie);
}else{
    $erreur = "Cet contenu n'existe déjà plus!";
}


include "../view/admin/detailCateg.php";