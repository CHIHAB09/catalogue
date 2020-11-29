<?php

// modification d'un point de vente
function updateMagasin($db,$idMagasin, $nomMagasin,$rue,$numero,$cdp,$ville,$long,$lat) {
	$sql = "UPDATE magasin SET nom = '$nomMagasin', rue = '$rue', numero = '$numero', codepostal = '$cdp', ville= '$ville', longitude = '$long', latitude= '$lat' WHERE idMagasin = $idMagasin";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La mise à jour a réussie<br>" : "La mise à jour a échouée: " . mysqli_error($db) . "<br>";
}

function selectsMagasinById($db,$idMagasin){
    
    $sql="SELECT * FROM magasin WHERE idMagasin = $idMagasin";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_assoc($result);;
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
    
}
