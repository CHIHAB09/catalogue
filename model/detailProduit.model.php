.<?php
// tous sur les produits par id
function selectsAllProduitsById($db,$idproduit){
    $sql="SELECT * 
    FROM produits P 
    LEFT JOIN produits_has_categorie AS PHC ON P.idproduit= PHC.produits_id 
    LEFT JOIN categorie AS C ON C.idcategorie = PHC.categorie_id
    LEFT JOIN images AS I ON I.produits_idproduit= P.idproduit  
    WHERE P.idproduit = '$idproduit' ; ";

    $result = mysqli_query($db, $sql);
    if($result) {

        $data = mysqli_fetch_assoc($result);
        return $data;
        
    }else{
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}