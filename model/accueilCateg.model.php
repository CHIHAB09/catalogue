<?php

// affichage des produits classé par categorie
function selectsCategories($db){
    $sql="SELECT * 
    FROM produits P 
    JOIN produits_has_categorie AS PHC ON P.idproduit= PHC.produits_id 
    JOIN categorie AS C ON C.idcategorie = PHC.categorie_id ORDER BY P.modele ; ";

    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}
//var_dump(selectsCategories($db));
