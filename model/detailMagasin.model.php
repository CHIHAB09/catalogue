<?php

//affichage de la liste des pointes de vente avec id
function selectsMagasinById ($db,$idMagasin){
    $sql="SELECT * FROM magasin WHERE idMagasin='$idMagasin' ORDER BY ville ASC";
    $result= mysqli_query($db,$sql);
    if($result){
        $data= mysqli_fetch_assoc($result);
        return $data;
    }else{
        return "Le point de vente n'éxiste plus:" . mysqli_error($db) . "<br>";
    }
}
