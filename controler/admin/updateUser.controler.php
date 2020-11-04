<?php

require_once "../model/crud.php";
require_once "../model/paginationModel.php";
 //$genre="";
$iduser="";
// on vérifie l'existence de la variable get id et que son contenu de type string ne contient que des numériques
  if(isset($_GET['iduser'])&&ctype_digit($_GET['iduser'])){
   
    // on traîte idMagasin en le transformant en entier si faux 0 => empty
    $iduser = (int) $_GET['iduser'];
    $user = selectsUserById($db,$iduser);
    

    }else{
        $erreur = "Cette utilisateur n'existe déjà plus!";
    
    // l'id n'existe pas ou n'est pas valide
    }
    
    
    //si le formulaire est envoyé , on ajoute l'existence de idmagasin
    if(isset($_POST['submit'])){
      
    //si une erreur vaudra "" => empty
    $nom = htmlspecialchars(strip_tags(trim($_POST['nom'])),ENT_QUOTES);
    $prenom = htmlspecialchars(strip_tags(trim($_POST['prenom'])),ENT_QUOTES);
    $pseudo = htmlspecialchars(strip_tags(trim($_POST['pseudo'])),ENT_QUOTES);
    $pwd = htmlspecialchars(strip_tags(trim($_POST['pwd'])),ENT_QUOTES);  
 
        //var_dump($idcategorie);
// si on a une erreur de type (ajout de la vérification de $idMagasin)
if(empty($nom)||empty($prenom)||empty($pseudo)||empty($pwd)){
    
    $message = "Erreur de type de données, veuillez recommencer";
}else {  
    updateUser($db, $nom,$prenom,$pseudo,$pwd,$iduser);
        //var_dump(mysqli_error($db));
     // redirection
     header("Location: ?pg=User&message=update");
     //var_dump(updateCategorie($db, $genre,$idcategorie));
 }
}

include "../view/admin/updateUser.php";