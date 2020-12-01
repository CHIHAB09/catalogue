<?php
include "../model/insertMagasin.model.php";



if (isset($_POST['submit'])) {
    
    $nomMagasin = htmlspecialchars(strip_tags(trim($_POST['nomMagasin'])),ENT_QUOTES); 
    $rue = htmlspecialchars(strip_tags(trim($_POST['rue'])),ENT_QUOTES);
    $numero = htmlspecialchars(strip_tags(trim($_POST['numero'])),ENT_QUOTES);
    $cdp = htmlspecialchars(strip_tags(trim($_POST['cdp'])),ENT_QUOTES);
    $ville = htmlspecialchars(strip_tags(trim($_POST['ville'])),ENT_QUOTES);
    $long = htmlspecialchars(strip_tags(trim($_POST['long'])),ENT_QUOTES);
    $lat = htmlspecialchars(strip_tags(trim($_POST['lat'])),ENT_QUOTES);
    // si on a une erreur de type
    if(empty($nomMagasin)||empty($rue)||empty($numero)||empty($cdp)||empty($ville)||empty($long)||empty($lat)|| strlen($cdp)>4){
        $message = "Erreur de type de données, veuillez recommencer";   
    }else {
        $insert = insertMagasin($db, $_POST['nomMagasin'], $_POST['rue'], $_POST['numero'], $_POST['cdp'], $_POST['ville'], $_POST['long'], $_POST['lat']);
        header("Location: ?pg=Magasin&message=insert");
    }
}


include "../view/admin/insertMagasin.php";