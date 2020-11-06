<?php
// supprimer un user
function deletePromo($db, $idpromotion) {
	$sql = "DELETE FROM promotion WHERE idpromotion = $idpromotion";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La suppression a réussi<br>" : "La suppression a raté: " . mysqli_error($db) . "<br>";
}
