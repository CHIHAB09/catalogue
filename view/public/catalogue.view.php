<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="preconnect" href="https://fonts.gstatic.com/%22%3E">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/catalogue.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<title>Catalogue</title>
<body>

    <h1>Panther Sneakers</h1></br>
    <h2>Catalogue!</h2></br>

   
    <div class="container"></div>
        <div class="recherche">

        </div>
        <div class="content">
            <?php
                foreach($produit as $item ) {
            ?>
            <div class="item">
            <div class="img"><img src="image/upload/medium/<?=$item['URL']?>"></div>
            <div class="nom"><h3><?=$item['modele']?></h3></div>
            <div class="prix"><p><?=$item['prix']?></p></div>
            <button class="btn" type="button"><a href="?pg=detailProduit&idproduit=<?=$item['idproduit']?>"title="detail produit">Découvrir</a></button>
        </div>

            <?php
        
                }
            ?>
        </div.recherch>
    </div>
</body>
</html>