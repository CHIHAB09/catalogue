<?php
require_once "../model/insertCateg.model.php";


// verification et securisation avant la requete au moment de l envoie du formulaire
if (isset($_POST['submit'])) {
    $genre = htmlspecialchars(strip_tags(trim($_POST['genre'])),ENT_QUOTES); 
    
   
    // si on a une erreur de type
    if(empty($genre)){
        
        $message = "Erreur de type de données, veuillez recommencer";
    }else {
        insertCategorie($db, $_POST['genre']);
        header("Location: ?pg=Categorie&message=insert");
}
}







include "../view/admin/insertCateg.php";