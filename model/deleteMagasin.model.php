<?php
//supprimer un point de vente
function deleteMagasin($db, $idMagasin) {
	$sql = "DELETE FROM magasin WHERE idMagasin = $idMagasin";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La suppression a réussi<br>" : "La suppression a raté: " . mysqli_error($db) . "<br>";
}