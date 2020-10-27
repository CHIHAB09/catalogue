<?php
require_once "../model/insertProduit.model.php";

// verification et securisation avant la requete au moment de l envoie du formulaire
if (isset($_POST['submit'])) {
    $model = htmlspecialchars(strip_tags(trim($_POST['modele'])),ENT_QUOTES); 
    $produitEvident = htmlspecialchars(strip_tags(trim($_POST['PE'])),ENT_QUOTES);
    $marque = htmlspecialchars(strip_tags(trim($_POST['marque'])),ENT_QUOTES);
    $descriptif = htmlspecialchars(strip_tags(trim($_POST['descriptif'])),ENT_QUOTES);
    $prix = htmlspecialchars(strip_tags(trim($_POST['prix'])),ENT_QUOTES);
   
    // si on a une erreur de type
    if(empty($model)||empty($produitEvident)||empty($marque)||empty($descriptif)||empty($prix)){
        $message = "Erreur de type de données, veuillez recommencer";
    }else {
        insertProduit($db, $_POST['modele'], $_POST['PE'], $_POST['marque'], $_POST['descriptif'], $_POST['prix']);
        //header("Location: ?pg=Produit&message=insert");
}
}
