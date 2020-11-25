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
    <h1 class="display-4 text-center mb-4">Catalogue | Administration des images</h1>
    <p>Bienvenue <?=$_SESSION['pseudo']?></p>
</header>

<main class="container">
            <h1 class="text-center mt-4">Admin | <?=$_SESSION['pseudo']?></h1>
            <h3><a href="?pg=Image" ><img src="image/retour.png" alt="Retour à la gestion des images"/></br></br></a></h3>
            <header class="row">
            <p class="lead col-md-8">Bienvenue ,</br>Voici le detail de cette image:</p>
            </header>
            
            <h3>Detail de l'image</h3>
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">Lgend</th>
                    <th scope="col">URL</th>
                    </tr>
                </thead>
                <tbody>
                        
                    <tr>
                    <td><?=$image['legend']?></td>
                    <td><?=$image['URL']?></td>
                    </tr>
                    
                </tbody>
           
        
                </table>
</main>