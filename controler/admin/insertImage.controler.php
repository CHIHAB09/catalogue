<?php
require_once "../model/insertImage.model.php";
var_dump($_FILES);

// verification et securisation avant la requete au moment de l envoie du formulaire
if (isset($_POST['submit'])) {
    $legend = htmlspecialchars(strip_tags(trim($_POST['legend'])),ENT_QUOTES); 
    //$URL = htmlspecialchars(strip_tags(trim($_POST['URL'])),ENT_QUOTES); // url d image non url de navigation donc pas de verification filter var
    $produit_idproduit = (int) $_POST['produits_idproduit'];
   
    
//upload
        // taille maximum en kilo octet
        $maxSize = 50000;
        $validExt =  array('.jpg','.jpeg','.gif','.png','.gif','.JPG','.JPEG','.PNG','.GIF'); 
        //superieur a zero
        if(($_FILES['URL']['error']> 0)){
        
            echo "une erreur est survenue lors du transfert";
            die;
        }
        $fileSize=$_FILES['URL']['size'];
        //test pour voir la taille de l image
        //echo $fileSize;
        //si la taille de limage est + grand que 50000 alors on affiche une erreur
        if($fileSize > $maxSize){
            echo "le fichier est trop gros !";
            die;
        }
        // on stock le nom  de limage das une variable
        $fileName = $_FILES['URL']['name'];
        //on coupe l image au point "."
        $fileExt = "." . strtolower(substr(strrchr($fileName, '.'),1));
        //on verifie si l extension est valide
        if(!in_array($fileExt,$validExt)){
            echo "le fichier n'est pas une image";
            die;
        }
        // la ou l enom est stocker temporairement
        $tmpName = $_FILES['URL']['tmp_name'];
        //on cree un nom et un id unique avec la methode md5 et rand pour avoir un resultat aleatoire
        $uniqueName = md5(uniqId(rand(),true));
        $fileName = "image/" . $uniqueName . $fileExt;
        $result = move_uploaded_file($tmpName,$fileName);
        //si on a un dplacement de fichier on insert a la db
        if($result){
            //insertion a db
           $insert = insertImages($db,$fileName,$URL,$produit_idproduit);
                if($insert){
                    $statuMess =  header("Location: ?pg=Image&message=insert");
                }
        }else{
            echo "Désoler une erreur c'est produite, attention seul les formats: JPG, JPEG, PNG, GIF sont accepter ";
        }

    /*// si on a une erreur de type
    if(empty($legend)||empty($URL)){
        
        $message = "Erreur de type de données, veuillez recommencer";
    }else {
        
}*/
}










include "../view/admin/insertImage.php";