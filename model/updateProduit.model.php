<?php

// affichage des categorie classé par categorie
function selectsCategories($db){
    $sql="SELECT * 
    FROM categorie ;";

    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}
// tous sur les produits par id
function selectsAllProduitsById($db,$idproduit){
    $sql="SELECT * 
    FROM produits P 
    LEFT JOIN produits_has_categorie AS PHC ON P.idproduit= PHC.produits_id 
    LEFT JOIN categorie AS C ON C.idcategorie = PHC.categorie_id
    LEFT JOIN images AS I ON I.produits_idproduit= P.idproduit  
    WHERE P.idproduit = '$idproduit';";

    $result = mysqli_query($db, $sql);
    if($result) {

        $data = mysqli_fetch_assoc($result);
        return $data;
        
    }else{
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}
// modif tous sur le produit
// tous sur les produits
function updateAllProduits($db,$idproduit,$model,$produitEvident,$marque,$descriptif,$prix,$legend,$URL){
    $sql="UPDATE produits P 
    JOIN produits_has_categorie AS PHC ON P.idproduit= PHC.produits_id 
    JOIN categorie AS C ON C.idcategorie = PHC.categorie_id
    JOIN images AS I ON I.produits_idproduit= P.idproduit
    SET modele = '$model', produit_evident = '$produitEvident', marque ='$marque', descriptif ='$descriptif', prix = '$prix', legend = '$legend', `URL` = '$URL'
    Where idproduit = '$idproduit'";

    $result = mysqli_query($db, $sql);
    if($result) { 
        return "La sélection a reussie: " . mysqli_error($db) . "<br>";
    }        
}
function updateProduitCateg($db,$idproduit,$idcategories){
mysqli_begin_transaction($db);
$sql = mysqli_query($db,
"DELETE FROM produits_has_categorie  WHERE produits_id = '$idproduit'");
 $sql1="INSERT INTO produits_has_categorie (produits_id,categorie_id) VALUES ";

 foreach($idcategories AS $idcategorie){
     $sql1.="($idproduit,$idcategorie)";
 }



mysqli_query($db,$sql1);

if($sql && $sql1){
    mysqli_commit($db);
    return true;
}else{
    mysqli_rollback($db);
    return false;
}

}