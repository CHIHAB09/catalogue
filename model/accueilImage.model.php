<?php

// affichage classé par image
function selectsImage($db){
    $sql="SELECT * , GROUP_CONCAT(`URL`  SEPARATOR '||') AS GroupeUrl
    FROM images I
    LEFT JOIN produits AS P ON  P.idproduit = `produits_idproduit`
    GROUP BY P.idproduit
    ORDER BY P.idproduit
    ";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}