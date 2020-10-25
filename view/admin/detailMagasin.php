<?php
require_once "../view/admin/parts/navBarAdmin.php";
require_once "../model/crud.php";
$titre= "Magasin";
$magasins = selectsMagasin($db);

if(isset($_GET['idMagasin'])&&ctype_digit($_GET["idMagasin"])){
    // on traîte idMagasin en le transformant en entier si faux 0 => empty
    $idMagasin = (int) $_GET['idMagasin'];
    // requête permettant de récupérer le contenu dans la base de donnée
    $magasins;
}else{
    $erreur = "Cet contenu n'existe déjà plus!";
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
</head>
<body>
<header class="jumbotron">
    <h1 class="display-4 text-center mb-4">Catalogue | Administration des magasins</h1>
    <p>Bienvenue <?=$_SESSION['pseudo']?></p>
</header>

<main class="container">
            <h1 class="text-center mt-4">Admin | <?=$_SESSION['pseudo']?></h1>
            <header class="row">
            <p class="lead col-md-8">Bienvenue ,</br>Voici le detail de ce magasin:</p>
            </header>
            
            <h3>Detail du magasin</h3>
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                      <th scope="col">Nom du magasin</th>
                      <th scope="col">Rue</th>
                      <th scope="col">Numéro</th>
                      <th scope="col">Code postal</th>
                      <th scope="col">Ville</th>
                      <th scope="col">Longitude</th>
                      <th scope="col">Latitude</th>
                      
                    </tr>
                </thead>
                <tbody>
                        <?php
                            foreach($magasins as $item ) {
                        ?>
                    <tr>
                        <td><?=$item['nom']?></td>
                        <td><?=$item['rue']?></td>
                        <td><?=$item['numero']?></td>
                        <td><?=$item['codepostal']?></td>
                        <td><?=$item['ville']?></td>
                        <td><?=$item['longitude']?></td>
                        <td><?=$item['latitude']?></td>
                        <td><a href="?pg=detailMagasin&id=<?=$item['idMagasin']?>"title="detail du magasin"><img src="image/detail.png" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detailsMagasin"><i class="fa fa-search" aria-hidden="true"></i></a></td>
                        <td><a href="?pg=updateMagasin&id=<?=$item['idMagasin']?>"title="modifier le magasin"><img src="image/update.png" alt="modifier le magasin" class="btn btn-sm btn-warning"/><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                        <td><a href="?pg=deleteMagasin&id=<?=$item['idMagasin']?>" title="supprimer ce magasin"><img src="image/delete.png" alt="supprimer ce magasin" class="btn btn-sm btn-danger"/><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    
                </tbody>
           
        <?php 
            }
                
        ?>
                </table>
</main>