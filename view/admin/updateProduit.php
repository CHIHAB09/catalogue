<?php

include "../view/admin/parts/navBarAdmin.php";
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
        <title>Admin - Modifier un produit : </title><?php
        // idem que dans le liens_admin_delete
        //echo (isset($erreur))? $erreur: $nomProduit=$_POST['modele'] ?>
    </head>

    <body>
           
           
           <header class="jumbotron">
            <h1 class="display-4 text-center mb-4">Admin - Modifier un produit :</h1>
            <?php //var_dump($produit); ?>
            <h2 class="display-5 text-center mb-4"><?php echo (isset($erreur))? "$erreur": $produit['modele']  ?></h2>
            <p>Bienvenue <?=$_SESSION['pseudo']?></p>
</header>
        
        <main class="container">
            <h3><a href="?pg=Produit" ><img src="image/retour.png" alt="Retour à la gestion des produits"/></a></h3>
            <?php
                // message d'erreur
                if(isset($message)) {
                    echo "<hr><h3>$message</h3><hr>";
            }
            // pas d'erreur du select
            if(!isset($erreur)){
            // on remplit le formulaire avec le contenu de notre select
            ?>
            <?php
                //foreach($produit AS $produit){
            ?>
           <form id="formulaire" method="POST">
               <div class="form-group row">
                   <label class="col-md-3" for="model">Modele  (*)</label>
                   <input name="modele" type="text" class="form-control col-md-9" id="modele" placeholder="Entrez le modele du produit" value="<?=$produit['modele'] ?>" required>
                   <div class="invalid-feedback text-left offset-md-3">Vous devez entrez le modele du produit</div>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="PE">Produit est-il en avant? (*)</label>
                   <input name="PE" type="PE" class="form-control col-md-9" id="PE" placeholder="OUI ? NON?" value="<?=$produit['produit_evident'] ?>" required>
                   <div class="invalid-feedback text-left offset-md-3">Vous devez precisez.</div>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="marque"> Marque (*)</label>
                   <input name="marque" type="text" class="form-control col-md-9" id="marque" placeholder="marque du model" value="<?=$produit['marque'] ?>" required>
                   <div class="invalid-feedback text-left offset-md-3">Vous devez precisez.</div>
               </div>
                <div class="form-group row">
                   <label class="col-md-3" for="descriptif">Descriptif (*)</label>
                   <input name="descriptif" class="form-control col-md-9" id="descriptif" placeholder="Descriptif"value="<?=$produit['descriptif'] ?>" required>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="prix">Prix (*)</label>
                   <input name="prix" class="form-control col-md-9" id="prix" placeholder="prix"value="<?=$produit['prix'] ?>" required>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="genre">Genre (*)</label>
                   <input name="genre" class="form-control col-md-9" id="genre" placeholder="genre"value="<?=$produit['genre'] ?>" required>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="legend">Legend (*)</label>
                   <input name="legend" class="form-control col-md-9" id="legend" placeholder="legend"value="<?=$produit['legend'] ?>" required>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="URL">URL (*)</label>
                   <input name="URL" class="form-control col-md-9" id="URL" placeholder="URL"value="<?=$produit['URL'] ?>" required>
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
        <?php
                
        //}
    
        ?>
    </body>
</html>