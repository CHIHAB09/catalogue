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
        <title>Admin - Modifier un magasin : </title><?php
        // idem que dans le liens_admin_delete
        //echo (isset($erreur))? $erreur: $nomMagasin=$_POST['nomMagasin'] ?>
    </head>

    <body>
           
           
           <header class="jumbotron">
            <h1 class="display-4 text-center mb-4">Admin - Modifier un magasin :</h1>
            <!--<?php var_dump($magasin); ?> !-->
            <h2 class="display-5 text-center mb-4"><?php echo (isset($erreur))? "$erreur": $magasin['nom']  ?></h2>
            <p>Bienvenue <?=$_SESSION['pseudo']?></p>
</header>
        
        <main class="container">
            <h3><a href="?pg=Magasin" ><img src="i#" alt="Retour à la gestion des magasins"/></a></h3>
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
                   <label class="col-md-3" for="nomMagasin">Nom du magasin  (*)</label>
                   <input name="nomMagasin" type="text" class="form-control col-md-9" id="nomMagasin" placeholder="Entrez le nom du magasin" value="<?=$magasin['nom'] ?>"required>
                   <div class="invalid-feedback text-left offset-md-3">Vous devez entrez le nom du magasin</div>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="rue">Rue(*)</label>
                   <input name="rue" type="rue" class="form-control col-md-9" id="rue" placeholder="Entrez l'adresse du magasin" value="<?=$magasin['rue'] ?>"required>
                   <div class="invalid-feedback text-left offset-md-3">La rue n'est pas correct.</div>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="numero">Numero</label>
                   <input name="numero" class="form-control col-md-9" id="numero" placeholder="Entrez un numéro"value="<?=$magasin['numero'] ?>">
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="ville">Ville</label>
                   <input name="ville" class="form-control col-md-9" id="ville" placeholder="Entrez une ville nuéro"value="<?=$magasin['ville'] ?>">
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="cdp">Code postal</label>
                   <input name="cdp" class="form-control col-md-9" id="cdp" placeholder="Entrez un code postal"value="<?=$magasin['codepostal'] ?>">
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="long">Longitude</label>
                   <input name="long" class="form-control col-md-9" id="long" placeholder="Entrez un nuéro"value="<?=$magasin['longitude'] ?>">
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="lat">Latitude</label>
                   <input name="lat" class="form-control col-md-9" id="lat" placeholder="Entrez un nuéro"value="<?=$magasin['latitude'] ?>">
               </div>
               <div class="form-group row">
                   <p class="form-text text-center col-md-12">(*) Champs obligatoires</p>
               </div>
               <!--info cacher pour le developer, verification en + pour etre sur que c est le bon id choisi !-->
               <!--<input type="hidden" name="idMagasin" value="<?=$nomMagasin['idMagasin']?>"!-->
               <button type="submit" name="update" class="btn btn-primary btn-block offset-md-4 col-md-4">Envoyer les modifications</button>
            </form>
           
        </main>
        <?php
        }
        ?>
    </body>
</html>