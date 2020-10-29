<?php


//cree un produit
function insertProduit($db,$modele,$top_vente,$marque,$descriptif,$prix){
    $sql= "INSERT INTO produits (modele, produit_evident, marque, descriptif, prix) VALUES('$modele','$top_vente','$marque','$descriptif','$prix');";
    $result = mysqli_query($db, $sql);
	return $result ? "L'insertion a réussie<br>" : "L'insertion a échouée: " . mysqli_error($db) . "<br>";
}