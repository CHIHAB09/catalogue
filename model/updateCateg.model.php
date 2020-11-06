<?php

// modification d'une cathegorie
function updateCategorie($db, $genre,$id) {
	$sql = "UPDATE categorie SET genre = '$genre' WHERE idcategorie = '$id'";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La mise à jour a réussie<br>" : "La mise à jour a échouée: " . mysqli_error($db) . "<br>";
}