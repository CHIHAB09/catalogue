<?php
require_once "../model/insertImage.model.php";


// verification et securisation avant la requete au moment de l envoie du formulaire
if (isset($_POST['submit'])) {
    $legend = htmlspecialchars(strip_tags(trim($_POST['legend'])),ENT_QUOTES); 
    $URL = htmlspecialchars(strip_tags(trim($_POST['URL'])),ENT_QUOTES); // url d image non url de navigation donc pas de verification filter var
    $produit_idproduit = htmlspecialchars(strip_tags(trim($_POST['produits_idproduit'])),ENT_QUOTES);
   
    // si on a une erreur de type
    if(empty($legend)||empty($URL)){
        
        $message = "Erreur de type de données, veuillez recommencer";
    }else {
        insertImages($db,$legend,$URL,$produit_idproduit);
        header("Location: ?pg=Image&message=insert");
}
}







include "../view/admin/insertImage.php";