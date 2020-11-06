<?php

require_once "../model/updatePromo.model.php";
require_once "../model/paginationModel.php";
 //$genre="";
$idpromotion="";
// on vérifie l'existence de la variable get id et que son contenu de type string ne contient que des numériques
  if(isset($_GET['idpromotion'])&&ctype_digit($_GET['idpromotion'])){
   
    // on traîte idMagasin en le transformant en entier si faux 0 => empty
    $idpromotion = (int) $_GET['idpromotion'];
    $promo = selectsPromoById($db,$idpromotion);
    

    }else{
        $erreur = "Cette categorie n'existe déjà plus!";
    
    // l'id n'existe pas ou n'est pas valide
    }
    
    
    //si le formulaire est envoyé , on ajoute l'existence de idmagasin
    if(isset($_POST['submit'])){
      
    //si une erreur vaudra "" => empty
    $reduction = htmlspecialchars(strip_tags(trim($_POST['reduction'])),ENT_QUOTES);
    $debut = date(y-m-d($_POST['debut']));
    $fin = date(y-m-d($_POST['fin'])); 
 
        //var_dump($idcategorie);
// si on a une erreur de type (ajout de la vérification de $idMagasin)
if(empty($reduction)||empty($debut)||empty($fin)){
    
    $message = "Erreur de type de données, veuillez recommencer";
}else {  
    $update = updatePromo ($db,$reduction,$debut,$fin,$idproduit);
        //var_dump(mysqli_error($db));
     // redirection
     header("Location: ?pg=Promo&message=update");
     var_dump($update);
 }
}

include "../view/admin/updatePromo.php";