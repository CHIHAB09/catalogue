<?php

//cree une image
function insertImages($db,$fileName,$URL,$produit_idproduit){
    $sql= "INSERT INTO images (legend,URL,produits_idproduit) VALUES('" .$fileName ."','$URL','$produit_idproduit');";
    $result = mysqli_query($db, $sql);
	return $result ? "L'insertion a réussie<br>" : "L'insertion a échouée: " . mysqli_error($db) . "<br>";
}