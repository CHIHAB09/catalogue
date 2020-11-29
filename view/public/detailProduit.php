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
                    <div class="img"><img src="image/upload/medium/<?=$detailProduits['URL']?>"></div>
                    <div class="nom">Modéle:<?=$detailProduits['modele']?></div>
                    <div class="marque">Marque:<?=$detailProduits['marque']?></div>
                    <div class="categ">Categorie:<?=$detailProduits['genre']?></div>
                    <div class="prix">Prix:<?=$detailProduits['prix']?></div>
                    <div class="descriptif">Descriptif:<?=$detailProduits['descriptif']?></div>
                    <div class="promo">Promo:<?=$detailProduits['reduction']?>%</div>
                </div>
            </div>
                    <div class="miniImage">
                        <?php
                            if(!empty($detailProduits['images'])){
                                $images = explode('||',$detailProduits['images']);
                            foreach($images AS $detailProduit){

                        
                        ?>
                       <img class="clickableimage lightboxImg" data-group="lightboxImg" src="image/upload/thumb/<?=$detailProduit?>">          
                        <?php
                        }
                        }
                        ?>
                   </div>  
                    <div id="floatingGallerie">
                        <img id="gaucheArrow" src="image/icone/gauche.png">
                        <img id="gallerieImage" src="image/upload/thumb/<?=$detailProduits['URL']?>">
                        <img id="droiteArrow" src="image/icone/droite.png">
                    </div>
        </div>
        <script src="../../public/js/lightbox.js"></script>
</body>
</html>


