<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com/%22%3E">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../public/css/detailProduit.css">
</head>
<body>
   
    <h1>Panther Sneakers</h1></br>
    <h2>Votre choix:</h2></br>

        <div id="detail" class="container">
            <div class="content">
                <div class="item">
                    <div class="nom">Modéle:<?=$detailProduit['modele']?></div>
                    <div class="marque">Marque:<?=$detailProduit['marque']?></div>
                    <div class="categ">Prix:<?=$detailProduit['genre']?></div>
                    <div class="prix">Prix:<?=$detailProduit['prix']?></div>
                    <div class="descriptif">Descriptif:<?=$detailProduit['descriptif']?></div>
                    <div class="promo">Promo:<?=$detailProduit['reduction']?>%</div>
                    <div class="img">
                        <?php
                        foreach($detailImages AS $detailImage){
                            
                        ?>
                        <img src="image/upload/medium/<?=$detailImage?>">            
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="miniImage">
            <?php
                    foreach($detailImages AS $detailImage){
                        
                    ?>
                    <img src="image/upload/thumb/<?=$detailImage?>">            
                    <?php
                    }
                    ?>
                
            </div>
        </div>
</body>
</html>


