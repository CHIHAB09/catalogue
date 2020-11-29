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


//supprimer une categorie
function deleteCategorie($db, $idcategorie) {
    mysqli_begin_transaction($db);
	$sql = mysqli_query($db,"DELETE FROM produits_has_categorie WHERE categorie_id = '$idcategorie';");
    $sql1 = mysqli_query($db,"DELETE FROM categorie WHERE idcategorie = '$idcategorie';");
    if($sql && $sql1){
        mysqli_commit($db);
        return true;
    }else{
        mysqli_rollback($db);
        return false;
    }
}
