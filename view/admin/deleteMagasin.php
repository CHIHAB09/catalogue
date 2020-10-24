<?php
require_once "../model/crud.php";
require_once "../model/paginationModel.php";
include "../view/admin/parts/navBarAdmin.php";
$magasin="";
// on vérifie l'existence de la variable get id et que son contenu de type string ne contient que des numériques
if(isset($_GET['idMagasin'])&&ctype_digit($_GET['idMagasin'])){
    // conversion en entier
    $idMagasin = (int) $_GET['idMagasin'];

    // on confirme la suppression en rajoutant la variable get ok
    if(isset($_GET['ok'])){
        function deleteMagasin ($db, $idMagasin){

        // redirection
        header("Location: ?admin=crudliens&message=supprim");
        

    }
}
 // préparation de la requête
 $sql = "SELECT nomMagasin, rue,cdp FROM magasin WHERE idMagasin=$idMagasin";
 // exécution de la requête
 $recup = mysqli_query($db,$sql) or die(mysqli_error($db));
 // si on trouve une ligne de résultat 1 vaut true
 if(mysqli_num_rows($recup)){
     $magasin = mysqli_fetch_assoc($recup);
 // mysqli_num_rows($recup) vaut 0 donc false
 }else{
     $erreur = "Ce magasin n'existe déjà plus!";
 }
// l'id n'existe pas ou n'est pas valide
}else{
 $erreur ="Joue pas avec le feu !!!";
}

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

        <title>Admin - Suppression d'un magasin- <?php echo (isset($erreur))? $erreur: $magasin['nomMagasin']  ?></title>µ

    </head>
    <body>
    <header class="jumbotron">
    <h1 class="display-4 text-center mb-4">Portfolio | Suppression du lien - <?php echo (isset($erreur))? $erreur: $magasin['nomMagasin']  ?></h1>
    <p>Bienvenue <?=$_SESSION['pseudo']?></p>
    </header> 

    <main class="container">
        <?php
            if(!isset($erreur)){
        ?>
<h3>Voulez vous vraiment supprimer :</h3><hr>
<h4><?=$magasin['nomMagasin']?></h4>
<h5><?=$magasin['cdp']?></h5>
        <hr>
        <a class="btn btn-danger" href="?pg=deleteMagasin.php&id=<?=$Magasin?>&ok" role="button">Supprimer définitivement !</a>
        <a class="btn btn-secondary" href="?pg=Magasin" role="button">Ne pas supprimer</a>
    <?php
    }else{
    ?>
        <h3>Retournez vers l'<a href="./">accueil</a></h3>
    <?php
    }
    ?>
    </main>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        
        <!-- Validation du formulaire -->
       <script> src="../../view/admin/deleteMagasin.php"</script>
    </body>
</html>