<?php
include "../view/admin/parts/navBarAdmin.php";
$produit = selectsProduit($db);
count($produit); // Permet de savoir le nombre d'éléments dans un array
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
            <p class="lead col-md-8">Bienvenue dans cette section qui permet de gérer les produits de vente. </p>
            <p class="offset-1 col-md-3"><a href="?pg=insertProduit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Ajouter un nouveau produit</a></p>
            </header>
            
            <?php
                // en cas de redirection depuis 1 des 3 pages du CrUD
                if(isset($_GET['message'])){
                switch ($_GET['message']){
                    case "delete":
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Produit effacé!
                        </div>
                        <?php
                        break;
                    case "insert":
                        ?>
                        <div class="alert alert-success" role="alert">
                            Produit inséré!
                        </div>
                        <?php
                        break;
                    case "update":
            ?>

                        <div class="alert alert-success" role="alert">
                            Produit modifie!
                        </div>

           
            <?php
    
                    }
                }
        
                    // pas encore de liens
                    if(isset($message)) {
                        echo "<h3>$message</h3>";
                    }else{
                // si $count est plus grand que 1, rajoutez s à "message"
            ?>
            
            
            <h3>Vous avez <?= count($produit) ?> magasin<?php if(count($produit)>1) echo "s"?></h3>
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
                }
        ?>
                </table>
</main>