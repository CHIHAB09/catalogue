<?php


// counte le nombre de produit
function countAllProduit($db){
    // le count renvoie une ligne de résultat avec le nombre de produit, utiliser la clef primaire permet d'éviter qu'il compte réellement le nombre d'articles: c'est un résultat se trouvant en début du code de la table (dans l'index)
    $req = "SELECT COUNT(idproduit) AS nbPr
FROM produits";
    $recup = mysqli_query($db,$req);
    $out = mysqli_fetch_assoc($recup);
    return $out["nbPr"];
}

// prend * produits avec categ et images (optionnal) mais avec 300 caractere de "texte" avec une pagination LIMIT
function produitLoadResumePagination($db,$begin,$nbperpage=10){
    $begin = (int) $begin;
    $nbperpage = (int) $nbperpage;
    $req = "SELECT P.idproduit, P.modele, LEFT(P.descriptif,300) AS modele, C.genre, I.legend, GROUP_CONCAT(I.legend SEPARATOR '|||') AS theimages_titre, GROUP_CONCAT(C.genre SEPARATOR '|||') AS genre
FROM produits P 
    LEFT JOIN  produits_has_categorie PHC 
        ON PHC.produits_id = P.idproduit
    LEFT JOIN images I  
        ON I.idmage = produits_idproduit
GROUP BY P.idproduit
ORDER BY P.prix DESC 
LIMIT $begin, $nbperpage;";
    $recup = mysqli_query($db,$req);
    // si au moins 1 résultat
    if(@mysqli_num_rows($recup)){
        // on utilise le fetch all car il peut y avoir plus d'un résultat
        return mysqli_fetch_all($recup,MYSQLI_ASSOC);
    }
    // no result
    return false;
}

// tout produits, categories et images (optionnal) avec ID
function produitLoadFull($db,$id){
    $id = (int) $id;
    $req = "SELECT P.idproduit, P.modele, LEFT(P.descriptif,300) AS modele, C.genre, I.legend, GROUP_CONCAT(I.legend SEPARATOR '|||') AS theimages_titre, GROUP_CONCAT(C.genre SEPARATOR '|||') AS genre
    FROM produits P 
        LEFT JOIN  produits_has_categorie PHC 
            ON PHC.produits_id = P.idproduit
        LEFT JOIN images I  
            ON I.idmage = produits_idproduit
WHERE P.idproduit=$idproduit
GROUP BY P.idproduit
    ";
    $recup = mysqli_query($db,$req);
    // si on a 1 résultat
    if(mysqli_num_rows($recup)){
        // on utilise le fetch all car il peut y avoir plus d'un résultat
        return mysqli_fetch_assoc($recup);
    }
    // no result
    return false;
}

// insertion d'un nouveau produit
function insertProduit($db,$model,$produitEvident,$marque,$descriptif,$prix){

    $sql="INSERT INTO produits (modele,produit_evident,marque,descriptif,prix) VALUES ('$model','$produitEvident','$marque','$descriptif','$prix');";
    $request = mysqli_query($db,$sql) or die(mysqli_error($db));
    // si le produit est bien inséré, on renvoie son ID
    return ($request)? mysqli_insert_id($db) :false;
}

// insertion du lien avec les catégories dans produits_has_categorie
function insertLinkProduitWithCateg($db,$idproduit,$tabCateg){

    // préparation de notre requête SQL avant la boucle
    $sql = "INSERT INTO produits_has_categorie (articles_idarticles,rubriques_idrubriques) VALUES ";
    // tant que l'on a des categorie cochées
    foreach($tabCateg AS $item){
        // on allonge notre requête SQL (évite des allez retour PHP/SQL)
        $sql .= "($idproduit,$item),";
    }
    // on retire la virgule de fin avec substr pour éviter une faute SQL (la virgule doit être suivie de valeurs)
    $sql = substr($sql,0,-1);
    $query = mysqli_query($db,$sql) or die(mysqli_error($db));
    return ($query)? true: false;
}

// suppression des liens avec les catégories dans produits_has_categorie
function deleteLinkProduitWithCateg($db,$idproduit){
    $idproduit = (int) $idproduit;
    // préparation de notre requête SQL avant la boucle
    $sql = "DELETE FROM produits_has_categorie WHERE produits_id = $idproduit";

    $query = mysqli_query($db,$sql) or die(mysqli_error($db));
    return ($query)? true: false;
}

// suppression d'un article via son ID

function deleteProduit($db,$idproduit){
    $idproduit = (int) $idproduit;
    $sql="DELETE FROM produits WHERE idproduit=$idproduit";
    return (@mysqli_query($db,$sql))? true : false;
}

/*
 * mise à jour du produits
 * $db -> connexion mysqli
 * $datas -> array de $_POST
 * $idproduit -> variable GET idproduit
 */

function updateProduit($db,$datas,$idproduit){
    // traîtement des variables
    // $_GET
    $idproduit = (int) $idproduit;
    // $_POST => on pourrait utiliser extract(), plus rapide mais dangereux et non sécurisé sans mettre les mêmes lignes que celles ci-dessous
    $idproduit = (int) $datas['idproduit'];
    $model = htmlspecialchars(strip_tags(trim($datas['modele'])),ENT_QUOTES);
    $produitEvident = (int) $datas['produit_evident'];
    $marque = htmlspecialchars(strip_tags(trim($datas['marque'])),ENT_QUOTES);
    // exception pour le strip_tags qui va accepter les balises html entre allowable_tags
    $descriptif= htmlspecialchars(strip_tags(trim($datas['descriptif']),'<p><br><a><img><h4><h5><b><strong><i><ul><li>'),ENT_QUOTES);
    $prix = htmlspecialchars(strip_tags(trim($datas['prix'])),ENT_QUOTES);


    // quelqu'un essaie de modifier un autre article que celui affiché
    if($idproduit!=$idproduit) return "Inutile d'essayer de supprimer un produit";

    if(empty($model)||!isset($produitEvident)||empty($marque)||empty($descriptif)||empty($prix)) 
    return "Vos champs ne sont pas correctement remplis";

    $sql ="UPDATE produits SET modele = '$model', produit_evident ='$produitEvident',marque='$marque', descriptif= '$descriptif',prix= '$prix' WHERE idproduit = $idproduit";

    $request = mysqli_query($db,$sql) or die(mysqli_error($db));
    return ($request)? $idproduit :false;


}


// fonction qui nous retourne un texte ou un mot aurait pu être coupé en supprimant le dernier espace trouvé
function cutTheTextModel($text){
    // longueur du texte reçu
    $textLength = strlen($text);
    // on trouve le dernier espace dans ce $text
    $positionLastSpace = strrpos($text, " ");
    // on coupe la chaine avec ce dernier caractère
    $final = substr($text, 0,$positionLastSpace);
    return $final;
}

/*
 * Utilisation :
 * @return String
 * @return error Empty'String
 * @params paginationModel(
 *      INT $nb_tot_item, // total's number of item
 *      INT $current_page, // current page (?pg=3)
 *      [INT]$nb_per_page=10, // numbers of item per page
 *      [STRING]$URL_VAR="", // other get's variables before pagination
 *      [STRING]$name_get_pagination="pg" // name of GET's variable for pagination
 * ): string
 */
function paginationModel($nb_tot_item,$current_page,$nb_per_page=10,$URL_VAR="",$name_get_pagination="pg"){

    // création de la variable de sortie
    $sortie="";

    // pour obtenir le nombre total de page, on divise le nombre total d'éléments affichables $nb_tot_item par le nombre d'éléments affichables par page, le tout arrondit à l'entier supérieur ceil()
    $nb_pages = ceil($nb_tot_item/$nb_per_page);

    // si on a qu'une seule page
    if($nb_pages<2){
        // on affiche une chaîne vide
        return $sortie;
    }

    $sortie.= "Page ";

    for($i=1;$i<=$nb_pages;$i++){
        // si on est sur la première page
        if($i==1){
            // si la première page est la page actuelle
            if($i==$current_page){
                $sortie .= "<< < ";
                // la première page n'est pas la page actuelle
            }else{
                // retour à la première ligne
                $sortie .= "<a href='?$URL_VAR&$name_get_pagination=$i'><<</a> ";
                // une page en arrière
                $sortie .= "<a href='?$URL_VAR&$name_get_pagination=".($current_page-1)."'><</a> ";
            }
        }
        // si on est sur la page actuelle, pas besoin de lien, sinon on en met un
        $sortie .= ($i==$current_page)
            ? "$i "
            : "<a href='?$URL_VAR&$name_get_pagination=$i'>$i</a> ";

        // si on est sur la dernière page
        if($nb_pages==$i){
            // si la page actuelle est la dernière page
            if($current_page==$i){
                $sortie.=" > >> ";
            }else{
                // page suivante
                $sortie.="<a href='?$URL_VAR&$name_get_pagination=".($current_page+1)."'>></a> ";
                // dernière page
                $sortie.="<a href='?$URL_VAR&$name_get_pagination=$i'>>></a> ";
            }
        }


    }
    return $sortie;
}