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

   <div class="recherche">
       <form class="form" method="get" action="?pg=Catalogue">
       <input type="text" hidden name="pg" value="Catalogue">
            <h4>Catégorie</h4>
            <?php
                foreach($categories AS $categorie) :
            ?>
            <label class="categecriture">
                <input type="checkbox" name="categories[<?=$categorie['idcategorie']?>]" class="form-check-input" value="<?=$categorie['idcategorie']?>"><?=$categorie['genre']?>
            </label>
            <?php
            endforeach;
            ?>
           
           <input class="barreSearch" name="prixMin" type="text" value="0"></input>
           <input class="barreSearch" name="prixMax" type="text" value="<?=$prixmax['prix']?>"></input>
           <input type="text" hidden value="ok" name="recherche"></input>
           <button class="search"type="submit">Recherche</button>
       </form>
   </div> 
    <div class="container">
        <p><?=$pagination?></p>
        <div class="content">

            <?php
            //var_dump($recupProdPage);
                foreach($recupProdPage as $item ) {
                  $url=explode('||',$item['GroupeUrl']);
            ?>
            <div class="item">
                <div class="img"style="background-image:url('image/upload/medium/<?=$url[0]?>');"></div>
                <div class="nom"><h3><?=$item['modele']?></h3></div>
                <div class="prix"><p><?=$item['prix']?>€</p></div>
                
                <button class="btn" type="button"><a href="?pg=detailProduit&idproduit=<?=$item['idproduit']?>"title="detail produit">Découvrir</a></button>
            </div>

            <?php
        
                }
            ?>
       
        </div>
        <p><?=$pagination?></p>
    </div>
    <!--<script src="../../public/js/promo.js"></script>-->
</body>
</html>