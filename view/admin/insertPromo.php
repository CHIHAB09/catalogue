<!doctype html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

        <title>Admin - Ajouter une promotion</title>
    </head>
    <body>

    <header class="jumbotron">
    <h1 class="display-4 text-center mb-4">Catalogue | Ajouter une promotion</h1>
    <p>Bienvenue <?=$_SESSION['pseudo']?></p>
    </header>
        
        <main class="container">
            <h1 class="text-center mt-4">Admin - <?=$_SESSION['pseudo']?></h1>
            <p class="lead text-center">Ce formulaire permet d'ajouter une nouvelle promotion dans la liste</p>
            <h3><a href="?pg=Promo" ><img src="image/retour.png" alt="Retour à l'accueil"/></a></h3>

            <?php
    // message d'erreur
    if(isset($message)) {
        echo "<hr><h3>$message</h3><hr>";
    }
    ?>

            <form id="formulaire" method="POST">
               <div class="form-group row">
                   <label class="col-md-3" for="reduction">Reduction  (*)</label>
                   <input name="reduction" type="text" class="form-control col-md-9" id="reduction" placeholder="Entrez votre reduction" required>
                   <div class="invalid-feedback text-left offset-md-3">Vous devez entrez votre reduction</div>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="debut">Date de debut  (*)</label>
                   <input name="debut" type="date" class="form-control col-md-9" id="debut" placeholder="Entrez votre date de debut" required>
                   <div class="invalid-feedback text-left offset-md-3">Vous devez entrez votre date de debut</div>
               </div>
               <div class="form-group row">
                   <label class="col-md-3" for="fin">date de fin  (*)</label>
                   <input name="fin" type="date" class="form-control col-md-9" id="fin" placeholder="Entrez votre date de fin" required>
                   <div class="invalid-feedback text-left offset-md-3">Vous devez entrez votre date de fin</div>
               </div>
               <div class="form-group row">
                   <p class="form-text text-center col-md-12">(*) Champs obligatoires</p>
               </div>
               <button type="submit" name="submit" class="btn btn-primary btn-block offset-md-4 col-md-4">Envoyer </button>
            </form>
            
        </main>                        

    </body>
</html>