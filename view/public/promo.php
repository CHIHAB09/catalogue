<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="preconnect" href="https://fonts.gstatic.com/%22%3E">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <h1>Panther Sneakers</h1></br>
        <h2>Promotion💶💶💶💶!</h2></br>

        <div class="container">
        <div class="feature">
                <?php
                        foreach($evidents as $evident ) {
                    ?>
                    <div class="evidentitem">
                    <div class="img"><img src="image/upload/medium/<?=$evident['URL']?>"></div>
                    <div class="marque"><h3>Marque:<?=$evident['marque']?></h3></div>
                    <div class="nom"><h4>Modele:<?=$evident['modele']?></h4></div>
                    <div class="categ"><p>Categorie:<?=$evident['genre']?></p></div>
                    <div class="prix1"><p>Prix:<?=$evident['prix']?>€</p></div>
                    <button class="btn" type="button"><a href="?pg=detailProduit&idproduit=<?=$evident['idproduit']?>"title="detail produit">Découvrir</a></button>
                </div>
                <?php }   ?>  
                </div>
                <div class="content">
                <?php
                        foreach($promos as $promo ) {
                    ?>
                    <div class="item">
                    <div class="img"><img src="image/upload/medium/<?=$promo['URL']?>"></div>
                    <div class="marque"><h3>Marque:<?=$promo['marque']?></h3></div>
                    <div class="nom"><h4>Modéle:<?=$promo['modele']?></h4></div>
                    <div class="categ"><p>Categorie:<?=$promo['genre']?></p></div>
                    <div class="promo"><p>Promotion:<?=$promo['reduction']?>%</p></div>
                    <div class="prix  <?=(!empty($promo['reduction'])) ? 'prixReduit':''?>" data-promo="<?=$promo['reduction']?>" data-prix="<?=$promo['prix']?>"><p>Prix:<?=$promo['prix']?>€</p></div>
                    <button class="btn" type="button"><a href="?pg=detailProduit&idproduit=<?=$promo['idproduit']?>"title="detail produit">Découvrir</a></button>
                </div>
                    <?php }   ?>
                </div>    
        </div>
        <script src="js/promo.js"></script>
    </body>
</html>

