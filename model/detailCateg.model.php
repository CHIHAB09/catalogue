<?php
// affichage les produits d'une categorie
function selectCategorieByID($db,$idcategorie){
    $sql="SELECT *
    FROM categorie 
    WHERE idcategorie= '$idcategorie'; ";

    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_assoc($result);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}
