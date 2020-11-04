<?php
require_once "../model/insertUser.model.php";


// verification et securisation avant la requete au moment de l envoie du formulaire
if (isset($_POST['submit'])) {
    $nom = htmlspecialchars(strip_tags(trim($_POST['nom'])),ENT_QUOTES);
    $prenom = htmlspecialchars(strip_tags(trim($_POST['prenom'])),ENT_QUOTES);
    $pseudo = htmlspecialchars(strip_tags(trim($_POST['pseudo'])),ENT_QUOTES);
    $pwd = htmlspecialchars(strip_tags(trim($_POST['pwd'])),ENT_QUOTES); 
    
   
    // si on a une erreur de type
    if(empty($nom)||empty($prenom)||empty($pseudo)||empty($pwd)){
        
        $message = "Erreur de type de données, veuillez recommencer";
    }else {
        insertUser($db,$nom,$prenom,$pseudo,$pwd);
        header("Location: ?pg=User&message=insert");
}
}



include "../view/admin/insertUser.php";