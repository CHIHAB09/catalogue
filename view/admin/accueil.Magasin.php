<?php
require_once "../model/crud.php";
require_once "../model/paginationModel.php";
include "../view/admin/parts/navBarAdmin.php";
$magasins = selectsMagasin($db);
count($magasins); // Permet de savoir le nombre d'éléments dans un array
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
            <p class="lead col-md-8">Bienvenue dans cette section qui permet de gérer les lieux de vente. </p>
            <p class="offset-1 col-md-3"><a href="?pg=insertMagasin" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Ajouter un nouveau lien</a></p>
            </header>
            
            
            
            <h3>Vous avez <?= count($magasins) ?> magasin<?php if(count($magasins)>1) echo "s"?></h3>
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
                        <td><a href="?pg=insertMagasin&id=<?=$item['idMagasin']?>"title="detail du magasin"><img src="image/detail.png" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detailsMagasin"><i class="fa fa-search" aria-hidden="true"></i></a></td>
                        <td><a href="?pg=updateMagasin&id=<?=$item['idMagasin']?>"title="modifier le magasin"><img src="image/modif.png" alt="modifier le magasin" class="btn btn-sm btn-warning"/><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                        <td><a href="?pg=deleteMagasin&id=<?=$item['idMagasin']?>" title="supprimer ce magasin"><img src="image/suprim.png" alt="supprimer ce magasin" class="btn btn-sm btn-danger"/><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    
                </tbody>
           
                            <?php } ?>
                            </table>
</main>