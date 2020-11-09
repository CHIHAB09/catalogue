<?php
require_once "../model/insertPromo.model.php";


// verification et securisation avant la requete au moment de l envoie du formulaire
if (isset($_POST['submit'])) {
    $reduction = htmlspecialchars(strip_tags(trim($_POST['reduction'])),ENT_QUOTES); 
    $debut = date('Y-m-d', strtotime($_POST['debut'])); // url d image non url de navigation donc pas de verification filter var
    $fin =date('Y-m-d', strtotime($_POST['fin']));
    $idproduit= (int) $_GET['idproduit'];
    var_dump($debut,$fin);
    // si on a une erreur de type
    if(empty($reduction)||empty($debut)||empty($fin)){
        
        $message = "Erreur de type de données, veuillez recommencer";
    }else {
        insertPromo($db,$idproduit,$reduction,$debut,$fin);
        
        //header("Location: ?pg=Promo&message=insert");
}
}







include "../view/admin/insertPromo.php";