<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../public/css/text.css">
        <link rel="stylesheet" href="../../public/css/style.css">
    </head>
    <body>
        <div class="container">
            <div class="feature">
            <?php foreach($evidents AS $evident){  ?>
                <div class="evident">
                    <div class="evidentitem">Marque:<?=$evident['marque']?></div>
                    <div class="evidentitem">Modele:<?=$evident['modele']?></div>
                    <div class="evidentitem">Prix:<?=$evident['prix']?></div>
                    <div class="evidentitem"><img src="image/upload/original/<?=$evident['URL']?>"></div>
                </div>
            <?php }   ?>  
            </div>
            <div class="content">
                <?php foreach($promos AS $promo){  ?>
                <div class= "bigItem">
                    <div class="item">Marque:<?=$promo['marque']?></div>
                    <div class="item">Modele:<?=$promo['modele']?></div>
                    <div class="item">Promo:<?=$promo['reduction']?></div>
                    <div class="item">Prix de base:<?=$promo['prix']?></div>
                    <button class="btn" type="button"><a href="?pg=detailProduit&idproduit=<?=$promo['idproduit']?>"title="detail produit">Découvrir</a></button>
                    <hr>
                </div>
                <?php }   ?>
            </div>
        </div>
    </body>
</html>

