<?php

// tous sur les produits
function selectsAllProduits($db){
    $sql="SELECT * , GROUP_CONCAT(`URL`  SEPARATOR '||' ) AS GroupeUrl
    FROM produits P 
    LEFT JOIN produits_has_categorie AS PHC ON P.idproduit= PHC.produits_id 
    LEFT JOIN categorie AS C ON C.idcategorie = PHC.categorie_id
    LEFT JOIN images AS I ON I.produits_idproduit= P.idproduit  
    GROUP BY idproduit
    ORDER BY P.idproduit;";

    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}


//affichage le nombre de produit que je possede
function selectCountProduit($db){
    $sql= "SELECT COUNT(idproduit) AS nbProd  FROM produits";
    $recup=mysqli_query($db,$sql);
    $data=mysqli_fetch_assoc($recup);
    $nbProd = $data['nbProd'];
    return $nbProd;
}

// select messages with pagination
function AllProduitsWithPagination($db,$begin,$end){
    $begin = (int) $begin;
    $end = (int) $end;

    $sql="SELECT P.* , GROUP_CONCAT(`URL`  SEPARATOR '||' ) AS GroupeUrl
     FROM `produits` P
     LEFT JOIN produits_has_categorie AS PHC ON P.idproduit= PHC.produits_id 
        LEFT JOIN categorie AS C ON C.idcategorie = PHC.categorie_id
        LEFT JOIN images AS I ON I.produits_idproduit= P.idproduit  
        GROUP BY P.idproduit
        ORDER BY P.modele ASC LIMIT $begin,$end;";

    $query = mysqli_query($db, $sql) or die(mysqli_error($db));
    return mysqli_fetch_all($query,MYSQLI_ASSOC);
}
