<?php
require_once "../view/admin/parts/navBarAdmin.php";
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
            <h3><a href="?pg=Magasin" ><img src="image/retour.png" alt="Retour à la gestion des magasins"/></br></br></a></h3>
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
                        
                    <tr>
                        <td><?=$magasins['nom']?></td>
                        <td><?=$magasins['rue']?></td>
                        <td><?=$magasins['numero']?></td>
                        <td><?=$magasins['codepostal']?></td>
                        <td><?=$magasins['ville']?></td>
                        <td><?=$magasins['longitude']?></td>
                        <td><?=$magasins['latitude']?></td>
                    </tr>
                    
                </tbody>
           
     
                </table>
</main>