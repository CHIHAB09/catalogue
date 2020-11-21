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



