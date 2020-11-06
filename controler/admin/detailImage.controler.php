<?php
require_once "../model/detailImage.model.php";


if(isset($_GET['idimage'])&&ctype_digit($_GET["idimage"])){
    // on traîte idproduit en le transformant en entier si faux 0 => empty
    $idimage = (int) $_GET['idimage'];
    // requête permettant de récupérer le contenu dans la base de donnée
    $image = selectsImageById($db,$_GET['idimage']);
    //var_dump($image);
}else{
    $erreur = "Cet contenu n'existe déjà plus!";
}





require_once "../view/detailImage.php";