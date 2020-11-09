<?php
include "../view/admin/parts/navBarAdmin.php";
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
            <header class="row">
            <p class="lead col-md-8">Bienvenue dans cette section qui permet de gérer les promotions. </p>
            </header>
            
            <?php
                // en cas de redirection depuis 1 des 3 pages du CrUD
                if(isset($_GET['message'])){
                switch ($_GET['message']){
                    case "delete":
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Promo effacé!
                        </div>
                        <?php
                        break;
                    case "insert":
                        ?>
                        <div class="alert alert-success" role="alert">
                            Promo inséré!
                        </div>
                        <?php
                        break;
                    case "update":
            ?>

                        <div class="alert alert-success" role="alert">
                            Promo modifie!
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
            
            
            <h3>Vous avez <?= count($promo) ?> promotion<?php if(count($promo)>1) echo "s"?></h3>
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                      <th scope="col">Reduction</th>
                      <th scope="col">Date debut</th>
                      <th scope="col">Date fin</th>
                      <th scope="col">Modele</th>
                      <th scope="col">Produit evident</th>
                      <th scope="col">Marque</th>
                      <th scope="col">Descriptif</th>
                      <th scope="col">Prix</th>
                      
                </thead>
                <tbody>
                        <?php
                            foreach($promo1 as $item ) {
                        ?>
                    <tr>
                        <td><?=$item['reduction']?></td>
                        <td><?=$item['debut']?></td>
                        <td><?=$item['fin']?></td>
                        <td><?=$item['modele']?></td>
                        <td><?=$item['produit_evident']?></td>
                        <td><?=$item['marque']?></td>
                        <td><?=$item['descriptif']?></td>
                        <td><?=$item['prix']?></td>
                        
                        
                        <td><a href="?pg=insertPromo&idproduit=<?=$item['idproduit']?>" title="cree une promo"><img src="image/insert.png" alt="cree une image" class="btn btn-sm btn-primary"/><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        <td><a href="?pg=detailPromo&idpromotion=<?=$item['idpromotion']?>"title="detail de la promo"><img src="image/detail.png" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detailImage"><i class="fa fa-search" aria-hidden="true"></i></a></td>
                        <td><a href="?pg=updatePromo&idpromotion=<?=$item['idpromotion']?>"title="modifier la promo"><img src="image/update.png" alt="modifier l'image" class="btn btn-sm btn-warning"/><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                        <td><a href="?pg=deletePromo&idpromotion=<?=$item['idpromotion']?>" title="supprimer cette promo"><img src="image/delete.png" alt="supprimer cette image" class="btn btn-sm btn-danger"/><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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