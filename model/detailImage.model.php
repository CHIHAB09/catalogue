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