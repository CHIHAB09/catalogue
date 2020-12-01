<?php
require_once "../model/updateMagasin.model.php";



$nomMagasin="";
// on vérifie l'existence de la variable get id et que son contenu de type string ne contient que des numériques
if(isset($_GET['idMagasin'])&&ctype_digit($_GET['idMagasin'])){
   
   // on traîte idMagasin en le transformant en entier si faux 0 => empty
   $idMagasin = (int) $_GET['idMagasin'];
   $magasin = selectsMagasinById ($db,$idMagasin);
   //var_dump($magasin);

   }else{
       $erreur = "Ce magasin n'existe déjà plus!";
   
   // l'id n'existe pas ou n'est pas valide
   }

   //si le formulaire est envoyé , on ajoute l'existence de idmagasin
   if(isset($_POST['update'])){
    //si une erreur vaudra "" => empty
    $nomMagasin = htmlspecialchars(strip_tags(trim($_POST['nomMagasin'])),ENT_QUOTES); 
    $rue = htmlspecialchars(strip_tags(trim($_POST['rue'])),ENT_QUOTES);
    $numero = htmlspecialchars(strip_tags(trim($_POST['numero']),ENT_QUOTES));
    $cdp = htmlspecialchars(strip_tags(trim($_POST['cdp']),ENT_QUOTES));
    $ville = htmlspecialchars(strip_tags(trim($_POST['ville']),ENT_QUOTES));
    $long = htmlspecialchars(strip_tags(trim($_POST['long']),ENT_QUOTES));
    $lat = htmlspecialchars(strip_tags(trim($_POST['lat']),ENT_QUOTES));

    //var_dump($idMagasin);
    // si on a une erreur de type (ajout de la vérification de $idMagasin)
    if(empty($nomMagasin)||empty($rue)||empty($numero)||empty($cdp)||empty($ville)||empty($long)||empty($lat)){
        $message = "Erreur de type de données, veuillez recommencer";
            }else {  
            updateMagasin($db,$idMagasin, $nomMagasin,$rue,$numero,$cdp,$ville,$long,$lat);
                //var_dump($idMagasin);
                // redirection
                header("Location: ?pg=Magasin&message=update");
                exit;
            
    }
}

include "../view/admin/updateMagasin.php";