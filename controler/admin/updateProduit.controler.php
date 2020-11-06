<?php

require_once "../model/updateProduit.model.php";
require_once "../model/paginationModel.php";
 
$idproduit="";
// on vérifie l'existence de la variable get id et que son contenu de type string ne contient que des numériques
  if(isset($_GET['idproduit'])&&ctype_digit($_GET['idproduit'])){
   
    // on traîte idMagasin en le transformant en entier si faux 0 => empty
    $idproduit = (int) $_GET['idproduit'];
    $produit =  selectsAllProduitsById($db,$idproduit);
  var_dump($produit);

    }else{
        $erreur = "Ce produit n'existe déjà plus!";
    
    // l'id n'existe pas ou n'est pas valide
    }

    
    //si le formulaire est envoyé , on ajoute l'existence de idmagasin
    if(isset($_POST['submit'])){
    //si une erreur vaudra "" => empty
    $model = htmlspecialchars(strip_tags(trim($_POST['modele'])),ENT_QUOTES); 
    $produitEvident = htmlspecialchars(strip_tags(trim($_POST['PE'])),ENT_QUOTES);
    $marque = htmlspecialchars(strip_tags(trim($_POST['marque'])),ENT_QUOTES);
    $descriptif = htmlspecialchars(strip_tags(trim($_POST['descriptif'])),ENT_QUOTES);
    $prix = htmlspecialchars(strip_tags(trim($_POST['prix'])),ENT_QUOTES);
    $genre = htmlspecialchars(strip_tags(trim($_POST['genre'])),ENT_QUOTES);
    $legend = htmlspecialchars(strip_tags(trim($_POST['legend'])),ENT_QUOTES);
    $URL = htmlspecialchars(strip_tags(trim($_POST['URL'])),ENT_QUOTES);
        //var_dump($idMagasin);
// si on a une erreur de type (ajout de la vérification de $idMagasin)
if(empty($model)||!isset($produitEvident)||empty($marque)||empty($descriptif)||empty($prix)||empty($model)||empty($legend)||empty($URL)){
      
    $message = "Erreur de type de données, veuillez recommencer";
}else {  
    $update=updateAllProduits($db,$idproduit,$model,$produitEvident,$marque,$descriptif,$prix,$genre,$legend,$URL);
    //var_dump($update);
     // redirection
     header("Location: ?pg=Produit&message=update");
     
 }
}

include "../view/admin/updateProduit.php";