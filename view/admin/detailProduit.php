<?php
require_once "../view/admin/parts/navBarAdmin.php";
require_once "../model/crud.php";
$titre= "Produit";


if(isset($_GET['idproduit'])&&ctype_digit($_GET["idproduit"])){
    // on traîte idproduit en le transformant en entier si faux 0 => empty
    $idproduit = (int) $_GET['idproduit'];
    // requête permettant de récupérer le contenu dans la base de donnée
    $produit = selectsAllProduitsById($db,$idproduit);
    var_dump($produit);  
    
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
            <h3><a href="?pg=Produit" ><img src="image/retour.png" alt="Retour à la gestion des produits"/></br></br></a></h3>
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
                      <th scope="col">Genre</th>
                      <th scope="col">Legend</th>
                      <th scope="col">URL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td><?=$produit['modele']?></td>
                        <td><?=$produit['produit_evident']?></td>
                        <td><?=$produit['marque']?></td>
                        <td><?=$produit['descriptif']?></td>
                        <td><?=$produit['prix']?></td>
                        <td><?=$produit['genre']?></td>
                        <td><?=$produit['legend']?></td>
                        <td><?=$produit['URL']?></td>
                    </tr>
                    
                </tbody>
        
                </table>
</main>