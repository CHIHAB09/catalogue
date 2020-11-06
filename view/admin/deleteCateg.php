<?php
include "../view/admin/parts/navBarAdmin.php"; ?>
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

        <title>Admin - Suppression d'une categorie <?php echo (isset($erreur))? $erreur: $categ['genre']  ?></title>

    </head>
    <body>
    <header class="jumbotron">
    <h1 class="display-4 text-center mb-4">Portfolio | Suppression categorie - <?php if (isset($erreur)){echo $erreur;}  ?></h1>
    <p>Bienvenue <?=$_SESSION['pseudo']?></p>
    </header> 

    <main class="container">
        <?php
            if(!isset($erreur)){
        ?>
<h3>Voulez vous vraiment supprimer :</h3><hr>
<h4><?=$categ['genre']?></h4>

        <hr>
        <a class="btn btn-danger" href="?pg=deleteCateg&idcategorie=<?=$idcategorie?>&ok" role="button">Supprimer définitivement !</a>
        <a class="btn btn-secondary" href="?pg=Categorie" role="button">Ne pas supprimer</a>
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
       <script> src="../../view/admin/deleteProduit.php"</script>
    </body>
</html>