<?php
// tout de promo
function selectsPromoProduit($db,$idproduit){
    $sql="SELECT *
    FROM produits P
    JOIN promotion AS PR ON PR.produits_idproduit= P.idproduit";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}
