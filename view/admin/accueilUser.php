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
    <h1 class="display-4 text-center mb-4">Catalogue | Administration des utilisateurs</h1>
    <p>Bienvenue <?=$_SESSION['pseudo']?></p>
</header>

<main class="container">
            <h1 class="text-center mt-4">Admin | <?=$_SESSION['pseudo']?></h1>
            <header class="row">
            <p class="lead col-md-8">Bienvenue dans cette section qui permet de gérer les utilisateurs. </p>
            <p class="offset-1 col-md-3"><a href="?pg=insertUser" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Ajouter une nouveau utilisateur</a></p>
            </header>
            
            <?php
                // en cas de redirection depuis 1 des 3 pages du CrUD
                if(isset($_GET['message'])){
                switch ($_GET['message']){
                    case "delete":
                        ?>
                        <div class="alert alert-danger" role="alert">
                            Utilisateur effacé!
                        </div>
                        <?php
                        break;
                    case "insert":
                        ?>
                        <div class="alert alert-success" role="alert">
                            utilisateur inséré!
                        </div>
                        <?php
                        break;
                    case "update":
                        ?>
                        <div class="alert alert-success" role="alert">
                            Utilisateur modifie!
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
            
            
            <h3>Vous avez <?= count($user) ?> categorie<?php if(count($user)>1) echo "s"?></h3>
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                      <th scope="col">Nom</th>
                      <th scope="col">Prenom</th>
                      <th scope="col">Pseudo</th>
                      <th scope="col">Mot de passe</th>
                      
                </thead>
                <tbody>
                        <?php
                            foreach($user as $item ) {
                        ?>
                    <tr>
                        <td><?=$item['nom']?></td>
                        <td><?=$item['prenom']?></td>
                        <td><?=$item['pseudo']?></td>
                        <td><?=$item['pwd']?></td>
                        
                        <td><a href="?pg=detailUser&iduser=<?=$item['iduser']?>"title="detail du user"><img src="image/detail.png" class="btn btn-sm btn-info" data-toggle="modal" data-target="#detailuser"><i class="fa fa-search" aria-hidden="true"></i></a></td>
                        <td><a href="?pg=updateUser&iduser=<?=$item['iduser']?>"title="modifier le user"><img src="image/update.png" alt="modifier le magasin" class="btn btn-sm btn-warning"/><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                        <td><a href="?pg=deleteUser&iduser=<?=$item['iduser']?>" title="supprimer cette user"><img src="image/delete.png" alt="supprimer ce magasin" class="btn btn-sm btn-danger"/><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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