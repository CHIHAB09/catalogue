<?php
// tout de promo avec id
function selectsPromoById($db,$idpromotion){
        $sql="SELECT * 
        FROM promotion
        WHERE idpromotion = '$idpromotion' ;";
            $result = mysqli_query($db, $sql);
        if($result) {
            $data = mysqli_fetch_assoc($result);
            return $data;
        }else {
            return "La sélection a échouée: " . mysqli_error($db) . "<br>";
        }
}
// modification d'une promo
function updatePromo($db, $reduction,$debut,$fin,$idpromotion) {
	$sql = "UPDATE promotion 
    SET reduction = '$reduction', debut = '$debut', fin = '$fin'
    WHERE idpromotion = '$idpromotion'";
	$result = mysqli_query($db, $sql);
	return $result ? "La mise à jour a réussie<br>" : "La mise à jour a échouée: " . mysqli_error($db) . "<br>";
}


