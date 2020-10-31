<?php
require_once "../view/admin/parts/navBarAdmin.php";
require_once "../model/crud.php";
$titre= "Categorie";
$categ = selectsCateg($db);

if(isset($_GET['idcategorie'])&&ctype_digit($_GET["idcategorie"])){
    // on traîte idproduit en le transformant en entier si faux 0 => empty
    $idcategorie = (int) $_GET['idcategorie'];
    // requête permettant de récupérer le contenu dans la base de donnée
    $categ;
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
    <h1 class="display-4 text-center mb-4">Catalogue | Administration des categories</h1>
    <p>Bienvenue <?=$_SESSION['pseudo']?></p>
</header>

<main class="container">
            <h1 class="text-center mt-4">Admin | <?=$_SESSION['pseudo']?></h1>
            <header class="row">
            <p class="lead col-md-8">Bienvenue ,</br>Voici le detail de cette categorie:</p>
            </header>
            
            <h3>Detail de la categorie</h3>
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">Genre</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            foreach($categ as $item ) {
                        ?>
                    <tr>
                    <td><?=$item['genre']?></td>
                    </tr>
                    
                </tbody>
           
        <?php 
            }
                
        ?>
                </table>
</main>