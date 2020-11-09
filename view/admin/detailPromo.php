<?php
require_once "../view/admin/parts/navBarAdmin.php";
var_dump($promo);
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
    <h1 class="display-4 text-center mb-4">Catalogue | Administration des promotions</h1>
    <p>Bienvenue <?=$_SESSION['pseudo']?></p>
</header>

<main class="container">
            <h1 class="text-center mt-4">Admin | <?=$_SESSION['pseudo']?></h1>
            <h3><a href="?pg=Promo" ><img src="image/retour.png" alt="Retour à la gestion des promotions"/></br></br></a></h3>
            <header class="row">
            <p class="lead col-md-8">Bienvenue ,</br>Voici le detail de cette promotion:</p>
            </header>
            
            <h3>Detail de la promotion</h3>
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">Reduction</th>
                    <th scope="col">Date de debut</th>
                    <th scope="col">Date de fin</th>
                    </tr>
                </thead>
                <tbody>
                        
                    <tr>
                    <td><?=$promo['reduction']?></td>
                    <td><?=$promo['debut']?></td>
                    <td><?=$promo['fin']?></td>
                    </tr>
                    
                </tbody>
           
        
                </table>
</main>