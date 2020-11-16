<?php
require_once "../model/insertImage.model.php";
//var_dump($_FILES);

// verification et securisation avant la requete au moment de l envoie du formulaire
if (isset($_POST['submit'])) {
    $legend = htmlspecialchars(strip_tags(trim($_POST['legend'])),ENT_QUOTES); 
    //$URL = htmlspecialchars(strip_tags(trim($_POST['URL'])),ENT_QUOTES); // url d image non url de navigation donc pas de verification filter var
    $produit_idproduit = (int) $_POST['produits_idproduit'];
   
    
//upload
        
                // si on veut y ajouter une image
                if(!empty($_FILES['URL'])){
                    $upload = uploadImage($_FILES['URL'],IMG_FORMAT,IMG_MAX_SIZE,IMG_UPLOAD_ORIGINAL,IMG_UPLOAD_MEDIUM,IMG_UPLOAD_SMALL,IMG_MEDIUM_WIDTH,IMG_MEDIUM_HEIGHT,IMG_SMALL_WIDTH,IMG_SMALL_HEIGHT,IMG_JPG_MEDIUM,IMG_JPG_SMALL);
                    echo "coucou";
                    // l'image a bien été envoyée, donc on obtient un tableau
                    if(is_array($upload)){
                        // on insert l'image (et on récupère l'id de l'image)
                        $idimage = insertImages($db,$legend,$upload[0],$produit_idproduit);

                    // en cas d'erreur (string)
                    }else{
                        $error = $upload;
                    }
                }
                header("Location: ?pg=Image&message=insert");
                exit;
            }else{

                $erreur ="Problème lors de l'insertion";
            }

        








include "../view/admin/insertImage.php";