<?php
// cree une promo
function insertPromo($db,$idproduit,$reduction,$debut,$fin){
    mysqli_begin_transaction($db);
	$sql = mysqli_query($db,"SELECT * FROM produits WHERE idproduit = '$idproduit';");
    $sql1 = mysqli_query($db,"INSERT INTO promotion  VALUES(DEFAULT,'$reduction','$debut','$fin','$idproduit');");
        if($sql && $sql1){
            mysqli_commit($db);
            return true;
        }else{
            mysqli_rollback($db);
            return false;
}
}

