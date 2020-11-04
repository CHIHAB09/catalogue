<?php
require_once "../model/insertPromo.model.php";


// verification et securisation avant la requete au moment de l envoie du formulaire
if (isset($_POST['submit'])) {
    $reduction = htmlspecialchars(strip_tags(trim($_POST['reduction'])),ENT_QUOTES); 
    $debut = htmlspecialchars(strip_tags(trim($_POST['debut'])),ENT_QUOTES); // url d image non url de navigation donc pas de verification filter var
    $fin = htmlspecialchars(strip_tags(trim($_POST['fin'])),ENT_QUOTES);
   
    // si on a une erreur de type
    if(empty($reduction)||empty($debut)||empty($fin)){
        
        $message = "Erreur de type de données, veuillez recommencer";
    }else {
        insertPromo($db,$reduction,$debut,$fin);
        var_dump(insertPromo($db,$reduction,$debut,$fin));
        //header("Location: ?pg=Promo&message=insert");
}
}







include "../view/admin/insertPromo.php";