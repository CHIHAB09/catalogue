<?php

// tous les promo (max 2)
function selectsAllPromo($db){
    $sql="SELECT *
    FROM produits P
    JOIN promotion AS PR ON PR.produits_idproduit= P.idproduit
    LIMIT 2";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}
// tous les produit meme sans promo 
function selectsPromoProduit($db){
    $sql="SELECT *
    FROM produits P
    LEFT JOIN promotion AS PR ON PR.produits_idproduit= P.idproduit";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}
