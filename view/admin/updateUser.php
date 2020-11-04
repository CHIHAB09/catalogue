<?php

include "../view/admin/parts/navBarAdmin.php";

$nomUser="";
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <title>Admin - Modifier un utilisateur : </title><?php
        // idem que dans le liens_admin_delete
        //echo (isset($erreur))? $erreur: $nomProduit=$_POST['modele'] ?>
    </head>

    <body>
           
           
           <header class="jumbotron">
            <h1 class="display-4 text-center mb-4">Admin - Modifier un utilisateur:</h1>
            <?php //var_dump($produit); ?>
            <h2 class="display-5 text-center mb-4"><?php echo (isset($erreur))? "$erreur": $user['pseudo']  ?></h2>
            <p>Bienvenue <?=$_SESSION['pseudo']?></p>
</header>
        
        <main class="container">
            <h3><a href="?pg=User" ><img src="image/retour.png" alt="Retour à la gestion des utilisateurs"/></a></h3>
            <?php
                // message d'erreur
                if(isset($message)) {
                    echo "<hr><h3>$message</h3><hr>";
            }
            // pas d'erreur du select
            if(!isset($erreur)){
            // on remplit le formulaire avec le contenu de notre select
            ?>
           <form id="formulaire" method="POST">
                <div class="form-group row">
                   <label class="col-md-3" for="nom">Nom  (*)</label>
                   <input name="nom" type="text" class="form-control col-md-9" id="nom" placeholder="Entrez votre nom" value="<?=$user['nom'] ?>" required>
                   <div class="invalid-feedback text-left offset-md-3">Vous devez entrez votre nom</div>
                </div>
                <div class="form-group row">
                   <label class="col-md-3" for="prenom">Prenom  (*)</label>
                   <input name="prenom" type="text" class="form-control col-md-9" id="prenom" placeholder="Entrez votre prenom" value="<?=$user['prenom'] ?>" required>
                   <div class="invalid-feedback text-left offset-md-3">Vous devez entrez votre prenom</div>
                </div>
                <div class="form-group row">
                   <label class="col-md-3" for="pseudo">Pseudo (*)</label>
                   <input name="pseudo" type="text" class="form-control col-md-9" id="pseudo" placeholder="Entrez un pseudo" value="<?=$user['pseudo'] ?>" required>
                   <div class="invalid-feedback text-left offset-md-3">Vous devez entrez un pseudo</div>
                </div>
                <div class="form-group row">
                   <label class="col-md-3" for="pwd">Mot de passe (*)</label>
                   <input name="pwd" type="PWD" class="form-control col-md-9" id="pwd" placeholder="Entrez un MDP" value="<?=$user['pwd'] ?>" required>
                   <div class="invalid-feedback text-left offset-md-3">Vous devez entrez un mot de passe</div>
                </div>
               
               
               <div class="form-group row">
                   <p class="form-text text-center col-md-12">(*) Champs obligatoires</p>
               </div>
               <button type="submit" name="submit" class="btn btn-primary btn-block offset-md-4 col-md-4">Envoyer </button>
            </form>
           
        </main>
        <?php
        }
        ?>
    </body>
</html>