<?php
require_once "../model/crud.php";
require_once "../model/paginationModel.php";
include "../view/admin/parts/navBarAdmin.php";



/*if (isset($_POST['submit'])) {
    $nomMagasin = htmlspecialchars(strip_tags(trim($_POST['nomMagasin'])),ENT_QUOTES); 
    $rue = htmlspecialchars(strip_tags(trim($_POST['rue'])),ENT_QUOTES);
    $numero = htmlspecialchars(strip_tags(trim($_POST['numero'])),ENT_QUOTES);
    $cdp = htmlspecialchars(strip_tags(trim($_POST['cdp'])),ENT_QUOTES);
    $ville = htmlspecialchars(strip_tags(trim($_POST['ville'])),ENT_QUOTES);
    $long = htmlspecialchars(strip_tags(trim($_POST['long'])),ENT_QUOTES);
    $lat = htmlspecialchars(strip_tags(trim($_POST['lat'])),ENT_QUOTES);
    // si on a une erreur de type
    if(empty($nomMagasin)||empty($rue)||empty($numero)||empty($cdp)||empty($ville)||empty($long)||empty($lat)|| strlen($cdp)>4){
        $message = "Erreur de type de données, veuillez recommencer";
    }else {
    insertMagasin($db, $_POST['nomMagasin'], $_POST['rue'], $_POST['numero'], $_POST['cdp'], $_POST['ville'], $_POST['long'], $_POST['lat']);
       //var_dump(mysqli_error($db));
        header("Location: ?pg=Magasin&message=insert");
}
}
*/
?>
<!doctype html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

        <title>Admin - Ajouter un magasin</title>
    </head>
    <body>

    <header class="jumbotron">
    <h1 class="display-4 text-center mb-4">Admin magasin | Ajouter un lieu</h1>
    <p>Bienvenue <?=$_SESSION['pseudo']?></p>
    </header>
        
        <main class="container">
            <h1 class="text-center mt-4">Admin - <?=$_SESSION['pseudo']?></h1>
            <p class="lead text-center">Ce formulaire permet d'ajouter un nouveau lieu dans la liste</p>
            <h3><a href="?pg=Magasin" ><img src="image/retour.png" alt="Retour à l'accueil"/></a></h3>

            <?php
    // message d'erreur
    if(isset($message)) {
        echo "<hr><h3>$message</h3><hr>";
    }
    ?>

            <form id="formulaire" method="POST">
               <div class="form-group row">
                   <label class="col-md-3" for="nomMagasin">Nom  (*)</label>
                   <input name="nomMagasin" type="text" class="form-control col-md-9" id="nomMagasin" placeholder="Entrez le nom du lieu" required>
                   <div class="invalid-feedback text-left offset-md-3">Vous devez entrez le nom du lieu</div>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="urlSite">Rue du lieu (*)</label>
                   <input name="rue" type="rue" class="form-control col-md-9" id="rue" placeholder="Entrez la rue" required>
                   <div class="invalid-feedback text-left offset-md-3">Vous devez rentrer une rue existente.</div>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="numero">numéro</label>
                   <textarea name="numero" class="form-control col-md-9" id="numero" placeholder="Entrez le numero"required></textarea>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="cdp">Code postal</label>
                   <textarea name="cdp" class="form-control col-md-9" id="cdp" placeholder="Entrez le code postal"required></textarea>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="ville">Ville</label>
                   <textarea name="ville" class="form-control col-md-9" id="ville" placeholder="Entrez la ville"required></textarea>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="long">Longitude</label>
                   <textarea name="long" class="form-control col-md-9" id="long" placeholder="Entrez la longitude"required></textarea>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="lat">Latitude</label>
                   <textarea name="lat" class="form-control col-md-9" id="lat" placeholder="Entrez la latitude"required></textarea>
               </div>
               <div class="form-group row">
                   <p class="form-text text-center col-md-12">(*) Champs obligatoires</p>
               </div>
               <button type="submit" name="submit" class="btn btn-primary btn-block offset-md-4 col-md-4">Envoyer </button>
            </form>
            
        </main>                        

    </body>
</html>