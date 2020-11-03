<?php

include "../view/admin/parts/navBarAdmin.php";

$nomImage="";
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <title>Admin - Modifier une image : </title><?php
        // idem que dans le liens_admin_delete
        //echo (isset($erreur))? $erreur: $nomProduit=$_POST['modele'] ?>
    </head>

    <body>
           
           
           <header class="jumbotron">
            <h1 class="display-4 text-center mb-4">Admin - Modifier une image:</h1>
            <?php //var_dump($produit); ?>
            <h2 class="display-5 text-center mb-4"><?php echo (isset($erreur))? "$erreur": $image['legend']  ?></h2>
            <p>Bienvenue <?=$_SESSION['pseudo']?></p>
</header>
        
        <main class="container">
            <h3><a href="?pg=Image" ><img src="image/retour.png" alt="Retour à la gestion des images"/></a></h3>
            <?php
                // message d'erreur
                if(isset($message)) {
                    echo "<hr><h3>$message</h3><hr>";
            }
            // pas d'erreur du select
            if(!isset($erreur)){
            // on remplit le formulaire avec le contenu de notre select
            ?>
           <form id="formulaire" method="POST">
                <div class="form-group row">
                   <label class="col-md-3" for="legend">Legend  (*)</label>
                   <input name="legend" type="text" class="form-control col-md-9" id="legend" placeholder="Entrez le genre" value="<?=$image['legend'] ?>" required>
                   <div class="invalid-feedback text-left offset-md-3">Vous devez entrez une legend/description de l'image</div>
                </div>
                <div class="form-group row">
                   <label class="col-md-3" for="URL">URL  (*)</label>
                   <input name="URL" type="text" class="form-control col-md-9" id="URL" placeholder="Entrez le chemin" value="<?=$image['URL'] ?>" required>
                   <div class="invalid-feedback text-left offset-md-3">Vous devez entrez le chemin de l'image</div>
                </div>
                <div class="form-group row">
                   <label class="col-md-3" for="produits_idproduit">L'ID du produit  (*)</label>
                   <input name="produits_idproduit" type="text" class="form-control col-md-9" id="produits_idproduit" placeholder="Entrez le chemin" value="<?=$image['produits_idproduit'] ?>" required>
                   <div class="invalid-feedback text-left offset-md-3">Vous devez entrez l'ID du produit que represente l'image</div>
                </div>
               
               
               <div class="form-group row">
                   <p class="form-text text-center col-md-12">(*) Champs obligatoires</p>
               </div>
               <button type="submit" name="submit" class="btn btn-primary btn-block offset-md-4 col-md-4">Envoyer </button>
            </form>
           
        </main>
        <?php
        }
        ?>
    </body>
</html>