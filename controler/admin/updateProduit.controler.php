<?php

require_once "../model/crud.php";
require_once "../model/paginationModel.php";
 // on vérifie l'existence de la variable get id et que son contenu de type string ne contient que des numériques

$idProduit="";

  if(isset($_GET['idProduit'])&&ctype_digit($_GET['idProduit'])){
   

 
    // on traîte idMagasin en le transformant en entier si faux 0 => empty
    $idProduit = (int) $_GET['idProduit'];
    $produit = selectsProduitById ($db,$idProduit);
    

    }else{
        $erreur = "Ce produit n'existe déjà plus!";
    
    // l'id n'existe pas ou n'est pas valide
    }


    //si le formulaire est envoyé , on ajoute l'existence de idmagasin
    if(isset($_POST['update'])){
    //si une erreur vaudra "" => empty
    $model = htmlspecialchars(strip_tags(trim($_POST['modele'])),ENT_QUOTES); 
    $produitEvident = htmlspecialchars(strip_tags(trim($_POST['PE'])),ENT_QUOTES);
    $marque = htmlspecialchars(strip_tags(trim($_POST['marque'])),ENT_QUOTES);
    $descriptif = htmlspecialchars(strip_tags(trim($_POST['descriptif'])),ENT_QUOTES);
    $prix = htmlspecialchars(strip_tags(trim($_POST['prix'])),ENT_QUOTES);
        //var_dump($idMagasin);
// si on a une erreur de type (ajout de la vérification de $idMagasin)
if(empty($model)||!isset($produitEvident)||empty($marque)||empty($descriptif)||empty($prix)){
    
    $message = "Erreur de type de données, veuillez recommencer";
}else {  
    updateProduit($db, $model,$produitEvident,$marque,$descriptif,$prix,$id);
        //var_dump($idMagasin);
     // redirection
     header("Location: ?pg=Produit&message=update");
     
 }
}

include "../view/admin/updateProduit.php";