<?php
require_once "../model/detailMagasin.model.php";

$titre= "Magasin";
if(isset($_GET['idMagasin'])&&ctype_digit($_GET["idMagasin"])){
    // on traîte idMagasin en le transformant en entier si faux 0 => empty
    $idMagasin = (int) $_GET['idMagasin'];
    // requête permettant de récupérer le contenu dans la base de donnée
    $magasins = selectsMagasinById ($db,$idMagasin);
}else{
    $erreur = "Cet contenu n'existe déjà plus!";
}


include "../view/admin/detailMagasin.php";