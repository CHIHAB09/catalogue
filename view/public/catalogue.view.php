<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
   <link rel="stylesheet" href="css/catalogue.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<title>Catalogue</title>
<body>

    <h1>Panther Sneakers:</h1></br>
    <h2>Catalogue!</h2>

   
    <div class="grille">
            <?php
                foreach($produit as $item ) {
            ?>
            <div class="item">
            <div class="img"><img src="image/upload/medium/<?=$item['URL']?>"></div>
            <div class="nom"><h3><?=$item['modele']?></h3></div>
            <div class="prix"><p><?=$item['prix']?></p></div>
            </div>
           

                
            
        <?php
        
                }
    ?>
    </div>
</body>
</html>