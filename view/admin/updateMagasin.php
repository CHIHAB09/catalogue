<?php
require_once "../model/crud.php";
require_once "../model/paginationModel.php";

$nomMagasin="";
//si le formulaire est envoyé , on ajoute l'existence de idLiens
if(isset($_GET['idMagasin'],$_POST['nomMagasin'],$_POST['rue'],$_POST['numero'],$_POST['cdp'],$_POST['ville'],$_POST['long'],$_POST['lat'])){
    // on traîte idMagasin en le transformant en entier si faux 0 => empty
$idMagasin = (int) $_GET['idMagasin'];
//si une erreur vaudra "" => empty
$nomMagasin = filter_var($_POST['nomMagasin'],FILTER_VALIDATE_URL); 
$rue = htmlspecialchars(strip_tags(trim($_POST['rue'])),ENT_QUOTES);
$numero = htmlspecialchars(strip_tags(trim($_POST['numero']),ENT_QUOTES));
$cdp = htmlspecialchars(strip_tags(trim($_POST['cdp']),ENT_QUOTES));
$ville = htmlspecialchars(strip_tags(trim($_POST['ville']),ENT_QUOTES));
$long = htmlspecialchars(strip_tags(trim($_POST['long']),ENT_QUOTES));
$lat = htmlspecialchars(strip_tags(trim($_POST['lat']),ENT_QUOTES));

// si on a une erreur de type (ajout de la vérification de $idMagasin)
if(empty($nomMagasin)||empty($rue)||$numero||empty($cdp)||empty($ville)||empty($long)||empty($lat)===false){
    $message = "Erreur de type de données, veuillez recommencer";
}else {  
    function updateMagasin($db,$nomMagasin,$numero,$cdp,$rue,$ville,$long,$lat){
    
     // redirection
     header("Location: ?pg=Magasin&message=update");
     
 }
}

 // on vérifie l'existence de la variable get id et que son contenu de type string ne contient que des numériques

if(isset($_GET['idMagasin'])&&ctype_digit($_GET['idMagasin'])){
// conversion en entier
$idMagasin = (int) $_GET['idMagasin'];

    //sql-deviens un update! NE PAS OUBLIER LE WHERE SINON TOUS RISQUES DE CHANGER
    $sql = "UPDATE magasin SET nom='$nomMagasin', rue='$rue', codepostal='$cdp',ville='$ville',longitude='$long',latitude='$lat'
    WHERE idMagasin=$idMagasin;";
    //execution de la requete
     mysqli_query($db,$sql) or die(mysqli_error($db));
     // redirection
     header("Location: ?admin=crudliens&message=modif");

}else{
    $erreur = "Ce magasin n'existe déjà plus!";
}
// l'id n'existe pas ou n'est pas valide
}else{
$erreur ="Joue pas aves le feu !!!!";
}

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
        echo (isset($erreur))? $erreur: $nomMagasin=$_POST['nomMagasin'] ?>
    </head>

    <body>
           
           
           <header class="jumbotron">
            <h1 class="display-4 text-center mb-4">Admin - Modifier un magasin :</h1>
            <h2 class="display-5 text-center mb-4"><?php echo (isset($erreur))? "$erreur": $nomMagasin=$_POST['nomMagasin']  ?></h2>
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
                   <input name="nomMagasin" type="text" class="form-control col-md-9" id="nomMagasin" placeholder="Entrez le nom du magasin" value="<?=$nomMagasin['nomMagasin']?>"required>
                   <div class="invalid-feedback text-left offset-md-3">Vous devez entrez le nom du magasin</div>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="rue">Rue(*)</label>
                   <input name="rue" type="rue" class="form-control col-md-9" id="rue" placeholder="Entrez l'adresse du magasin" value="<?=$nomMagasin['rue']?>"required>
                   <div class="invalid-feedback text-left offset-md-3">La rue n'est pas correct.</div>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="numero">Numero</label>
                   <input name="numero" class="form-control col-md-9" id="description" placeholder="Entrez un numéro"><?=$nomMagasin['numero']?>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="ville">Ville</label>
                   <input name="ville" class="form-control col-md-9" id="ville" placeholder="Entrez une ville nuéro"><?=$nomMagasin['ville']?>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="cdp">Code postal</label>
                   <input name="cdp" class="form-control col-md-9" id="cdp" placeholder="Entrez un code postal"><?=$nomMagasin['cdp']?>>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="long">Longitude</label>
                   <input name="long" class="form-control col-md-9" id="long" placeholder="Entrez un nuéro"><?=$nomMagasin['long']?>>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="lat">Latitude</label>
                   <input name="lat" class="form-control col-md-9" id="lat" placeholder="Entrez un nuéro"><?=$nomMagasin['lat']?>>
               </div>
               <div class="form-group row">
                   <p class="form-text text-center col-md-12">(*) Champs obligatoires</p>
               </div>
               <!--info cacher pour le developer, verification en + pour etre sur que c est le bon id choisi !-->
               <!--<input type="hidden" name="idLiens" value="<?=$nomMagasin['idMagasin']?>"!-->
               <button type="submit" class="btn btn-primary btn-block offset-md-4 col-md-4">Envoyer les modifications</button>
            </form>
           
        </main>
        <?php
        }
        ?>
    </body>
</html>