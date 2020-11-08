<?php


// affichage classé par image
function selectsImageById($db,$idimage){
    $sql="SELECT * FROM images 
    WHERE idimage = '$idimage'";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_assoc($result);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}


// modification d'une image
function updateImage($db, $legend,$URL,$idimage) {
	$sql = "UPDATE images SET legend = '$legend', `URL`= '$URL' WHERE idimage = '$idimage'";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La mise à jour a réussie<br>" : "La mise à jour a échouée: " . mysqli_error($db) . "<br>";
}