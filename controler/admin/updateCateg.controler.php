<?php

require_once "../model/updateCateg.model.php";

 //$genre="";
$idcategorie="";
// on vérifie l'existence de la variable get id et que son contenu de type string ne contient que des numériques
  if(isset($_GET['idcategorie'])&&ctype_digit($_GET['idcategorie'])){
   
    // on traîte idMagasin en le transformant en entier si faux 0 => empty
    $idcategorie = (int) $_GET['idcategorie'];
    $categ = selectCategorieByID($db,$idcategorie);
    

    }else{
        $erreur = "Cette categorie n'existe déjà plus!";
    
    // l'id n'existe pas ou n'est pas valide
    }
    
    
    //si le formulaire est envoyé , on ajoute l'existence de idmagasin
    if(isset($_POST['submit'])){
      
    //si une erreur vaudra "" => empty
    $genre = htmlspecialchars(strip_tags(trim($_POST['genre'])),ENT_QUOTES); 
 
        //var_dump($idcategorie);
// si on a une erreur de type (ajout de la vérification de $idMagasin)
if(empty($genre)){
    
    $message = "Erreur de type de données, veuillez recommencer";
}else {  
    updateCategorie($db, $genre,$idcategorie);
        //var_dump(mysqli_error($db));
     // redirection
     header("Location: ?pg=Categorie&message=update");
     //var_dump(updateCategorie($db, $genre,$idcategorie));
 }
}

include "../view/admin/updateCateg.php";