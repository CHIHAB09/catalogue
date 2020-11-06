<?php
// modif tous sur le produit
// tous sur les produits
function updateAllProduits($db,$idproduit,$model,$produitEvident,$marque,$descriptif,$prix,$genre,$legend,$URL){
    $sql="UPDATE produits P 
    JOIN produits_has_categorie AS PHC ON P.idproduit= PHC.produits_id 
    JOIN categorie AS C ON C.idcategorie = PHC.categorie_id
    JOIN images AS I ON I.produits_idproduit= P.idproduit
    SET modele = '$model', produit_evident = '$produitEvident', marque ='$marque', descriptif ='$descriptif', prix = '$prix', genre = '$genre', legend = '$legend', URL = '$URL'
    Where idproduit = '$idproduit'
    AND P.idproduit= PHC.produits_id
    AND C.idcategorie= PHC.categorie_id
    AND I.produits_idproduit= P.idproduit;";

    $result = mysqli_query($db, $sql);
    if(!$result) { 
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }        
}