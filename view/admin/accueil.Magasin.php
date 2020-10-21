<?php
require_once "../../model/crud.php";
require_once "../../model/paginationModel.php";
include "../../view/admin/parts/navBaraAdmin.php";
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
            <h1 class="text-center mt-4">Admin | <?=$nom?></h1>
            <header class="row">
            <p class="lead col-md-8">Bienvenue dans cette section qui permet de gérer les lieux de vente. </p>
            <p class="offset-1 col-md-3"><a href="?admin=ajouter_liens" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Ajouter un nouveau lien</a></p>
            </header>
            
            <?php
            // en cas de redirection depuis 1 des 3 pages du CrUD
            if(isset($_GET['message'])){
                switch ($_GET['message']){
                    case "supprim":
                        ?>
                        <div class="alert alert-success" role="alert">
                            Magasin effacé!
                        </div>
                        <?php
                        break;
                    case "ajouter":
                        ?>
                        <div class="alert alert-success" role="alert">
                            Magasin inséré!
                        </div>
                        <?php
                        break;
                    case "modif":
            ?>
            <div class="alert alert-success" role="alert">
                Magasin modifié!
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
            <h3>Vous avez <?=$count?> message<?php if($count>1) echo "s"?></h3>
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                      <th scope="col">Nom du magasin</th>
                      <th scope="col">URL</th>
                      <th scope="col">Description</th>
                      <th scope="col">Action</th>
                      <th scope="col"></th>
                      <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            foreach ($tous_les_liens as $item ){
                        ?>
                    <tr>
                        <td><?=$item['nomdusite']?></td>
                        <td><a href="<?=$item['url']?>" title="<?=$item['nomdusite']?>" target="_blank"><?=$item['url']?></a></td>
                        <td><?=$item['description']?></td>
                        <td><a href="?admin=voir_detail_liens&id=<?=$item['idLiens']?>"title="detail du lien"><img src="image/detail.png" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detailsLien"><i class="fa fa-search" aria-hidden="true"></i></a></td>
                        <td><a href="?admin=modifier_liens&id=<?=$item['idLiens']?>"title="modifier ce lien"><img src="image/modif.png" alt="modifier ce lien" class="btn btn-sm btn-warning"/><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                        <td><a href="?admin=confirm_supprim_liens&id=<?=$item['idLiens']?>" title="supprimer ce lien"><img src="image/suprim.png" alt="supprimer ce lien" class="btn btn-sm btn-danger"/><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </tr>
                    <?php
                            }

                        }
                    ?>
                </tbody>
            </table>
           
</main>