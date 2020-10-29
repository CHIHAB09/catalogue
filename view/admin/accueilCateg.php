<?php
include "../view/admin/parts/navBarAdmin.php";
$categ = selectsAllCategories($db);
count($categ); // Permet de savoir le nombre d'éléments dans un array
//var_dump ($categ);
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
    <h1 class="display-4 text-center mb-4">Catalogue | Administration des categorie</h1>
    <p>Bienvenue <?=$_SESSION['pseudo']?></p>
</header>

<main class="container">
            <h1 class="text-center mt-4">Admin | <?=$_SESSION['pseudo']?></h1>
            <header class="row">
            <p class="lead col-md-8">Bienvenue dans cette section qui permet de gérer les categories. </p>
            <p class="offset-1 col-md-3"><a href="?pg=insertMagasin" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Ajouter une nouvelle categorie</a></p>
            </header>
            
            <?php
                // en cas de redirection depuis 1 des 3 pages du CrUD
                if(isset($_GET['message'])){
                switch ($_GET['message']){
                    case "delete":
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Categorie effacé!
                        </div>
                        <?php
                        break;
                    case "insert":
                        ?>
                        <div class="alert alert-success" role="alert">
                        Categorie inséré!
                        </div>
                        <?php
                        break;
                    case "update":
            ?>

                        <div class="alert alert-success" role="alert">
                        Categorie modifie!
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
            
            
            <h3>Vous avez <?= count($categ) ?> categorie<?php if(count($categ)>1) echo "s"?></h3>
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                      <th scope="col">Genre</th>
                      <th scope="col">Modele</th>
                      <th scope="col">produit en evident</th>
                      <th scope="col">Marque</th>
                      <th scope="col">Descriptif</th>
                      <th scope="col">Prix</th>
                      <th scope="col">Legend</th>
                      <th scope="col">Url</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            foreach($categ as $item ) {
                        ?>
                    <tr>
                        <td><?=$item['genre']?></td>
                        <td><?=$item['modele']?></td>
                        <td><?=$item['produit_evident']?></td>
                        <td><?=$item['marque']?></td>
                        <td><?=$item['descriptif']?></td>
                        <td><?=$item['prix']?></td>
                        <td><?=$item['legend']?></td>
                        <td><?=$item['URL']?></td>
                        <td><a href="?pg=detailCateg&idcategorie=<?=$item['idcategorie']?>"title="detail de la categorie"><img src="image/detail.png" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detailsMagasin"><i class="fa fa-search" aria-hidden="true"></i></a></td>
                        <td><a href="?pg=updateCateg&idcategorie=<?=$item['idcategorie']?>"title="modifier la categorie"><img src="image/update.png" alt="modifier le magasin" class="btn btn-sm btn-warning"/><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                        <td><a href="?pg=deleteCateg&idcategorie=<?=$item['idcategorie']?>" title="supprimer cette categorie"><img src="image/delete.png" alt="supprimer ce magasin" class="btn btn-sm btn-danger"/><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    
                </tbody>
           
        <?php 
            }
                }
        ?>
                </table>
</main>
<footer>




</footer>