<?php
// pour les produit evident reprendre
function selectsAllProduitsEvident($db){
    $sql="SELECT * 
    FROM produits P 
    LEFT JOIN produits_has_categorie AS PHC ON P.idproduit= PHC.produits_id 
    LEFT JOIN categorie AS C ON C.idcategorie = PHC.categorie_id
    LEFT JOIN images AS I ON I.produits_idproduit= P.idproduit  
    ORDER BY produit_evident DESC
    LIMIT 1; ";

    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}


// pour les produit evident reprendre
function selectsAllProduitsPromo($db){
    $sql="SELECT * 
    FROM produits P 
    LEFT JOIN produits_has_categorie AS PHC ON P.idproduit= PHC.produits_id 
    LEFT JOIN categorie AS C ON C.idcategorie = PHC.categorie_id
    LEFT JOIN images AS I ON I.produits_idproduit= P.idproduit
    JOIN promotion AS Pr ON Pr.produits_idproduit = P.idproduit
    ORDER BY reduction DESC
    LIMIT 3;";

    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}
