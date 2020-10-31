<?php


//cree une categorie
function insertCategorie($db,$genre){
    $sql= "INSERT INTO categorie (genre) VALUES('$genre');";
    $result = mysqli_query($db, $sql);
	return $result ? "L'insertion a réussie<br>" : "L'insertion a échouée: " . mysqli_error($db) . "<br>";
}