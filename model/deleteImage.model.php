<?php
//supprimer une image

function deleteImage($db, $idimage) {
	$sql = "DELETE FROM images WHERE idimage = $idimage";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La suppression a réussi<br>" : "La suppression a raté: " . mysqli_error($db) . "<br>";
}
