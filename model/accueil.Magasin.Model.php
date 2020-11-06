<?php
include "../view/admin/accueil.Magasin.php";

//affichage de la liste des pointes de vente 
function selectsMagasin ($db){
    $sql="SELECT * FROM magasin  ORDER BY ville ASC";
    $result= mysqli_query($db,$sql);
    if($result){
        $data= mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $data;
    }else{
        return "Le point de vente n'éxiste plus:" . mysqli_error($db) . "<br>";
    }
}