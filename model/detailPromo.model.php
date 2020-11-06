<?php

// affichage promo classé par id
function selectsPromoById($db,$idpromotion){
    
    $sql="SELECT * FROM promotion Where idpromotion = '$idpromotion'";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_assoc($result);;
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
    
}