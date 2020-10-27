<?php
require_once "../view/admin/parts/navBarAdmin.php";
require_once "../model/crud.php";
$titre= "Produit";
$produit = selectsProduit($db);

if(isset($_GET['idProduit'])&&ctype_digit($_GET["idProduit"])){
    // on traîte idProduit en le transformant en entier si faux 0 => empty
    $idProduit = (int) $_GET['idProduit'];
    // requête permettant de récupérer le contenu dans la base de donnée
    $produit;
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
    <h1 class="display-4 text-center mb-4">Catalogue | Administration des produits</h1>
    <p>Bienvenue <?=$_SESSION['pseudo']?></p>
</header>

<main class="container">
            <h1 class="text-center mt-4">Admin | <?=$_SESSION['pseudo']?></h1>
            <header class="row">
            <p class="lead col-md-8">Bienvenue ,</br>Voici le detail de ce produit:</p>
            </header>
            
            <h3>Detail du produit</h3>
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">Modele</th>
                      <th scope="col">Produit en evident</th>
                      <th scope="col">Marque</th>
                      <th scope="col">Descriptif</th>
                      <th scope="col">Prix</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            foreach($produit as $item ) {
                        ?>
                    <tr>
                    <td><?=$item['modele']?></td>
                        <td><?=$item['produit_evident']?></td>
                        <td><?=$item['marque']?></td>
                        <td><?=$item['descriptif']?></td>
                        <td><?=$item['prix']?></td>
                        <td><a href="?pg=detailProduit&idProduit=<?=$item['idProduit']?>"title="detail du produit"><img src="image/detail.png" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detailsProduit"><i class="fa fa-search" aria-hidden="true"></i></a></td>
                        <td><a href="?pg=updateProduit&idProduit=<?=$item['idProduit']?>"title="modifier le produit"><img src="image/update.png" alt="modifier le produit" class="btn btn-sm btn-warning"/><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                        <td><a href="?pg=deleteProduit&idProduit=<?=$item['idProduit']?>" title="supprimer ce produit"><img src="image/delete.png" alt="supprimer ce produit" class="btn btn-sm btn-danger"/><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    
                </tbody>
           
        <?php 
            }
                
        ?>
                </table>
</main>