<?php
require_once "../model/updateImage.model.php";
require_once "../model/paginationModel.php";
 //$genre="";
$idimage="";
// on vérifie l'existence de la variable get id et que son contenu de type string ne contient que des numériques
  if(isset($_GET['idimage'])&&ctype_digit($_GET['idimage'])){
   
    // on traîte idMagasin en le transformant en entier si faux 0 => empty
    $idimage = (int) $_GET['idimage'];
    $image = selectsImageById($db,$idimage);
    

    }else{
        $erreur = "Cette categorie n'existe déjà plus!";
    
    // l'id n'existe pas ou n'est pas valide
    }
    
    
    //si le formulaire est envoyé , on ajoute l'existence de idmagasin
    if(isset($_POST['submit'])){
      
    //si une erreur vaudra "" => empty
    $legend = htmlspecialchars(strip_tags(trim($_POST['legend'])),ENT_QUOTES);
    $URL = htmlspecialchars(strip_tags(trim($_POST['URL'])),ENT_QUOTES);
    $produits_idproduit = htmlspecialchars(strip_tags(trim($_POST['produits_idproduit'])),ENT_QUOTES); 
 
        //var_dump($idcategorie);
// si on a une erreur de type (ajout de la vérification de $idMagasin)
if(empty($legend)||empty($URL)||empty($produits_idproduit)){
    
    $message = "Erreur de type de données, veuillez recommencer";
}else {  
    $image1=updateImage($db,$legend,$URL,$idimage);
        //var_dump(mysqli_error($db));
     // redirection
     header("Location: ?pg=Image&message=update");
     exit;
    // var_dump(mysqli_error($db));
 }
}

include "../view/admin/updateImage.php";