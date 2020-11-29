<?php

// affichage des produits classé par categorie
function selectsCategories($db){
    $sql="SELECT * 
    FROM categorie";

    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}
//var_dump(selectsCategories($db));
