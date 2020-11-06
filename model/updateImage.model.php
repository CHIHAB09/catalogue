<?php
// modification d'une image
function updateImage($db, $legend,$URL,$idimage) {
	$sql = "UPDATE images SET legend = '$legend', `URL`= '$URL' WHERE idimage = '$idimage'";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La mise à jour a réussie<br>" : "La mise à jour a échouée: " . mysqli_error($db) . "<br>";
}