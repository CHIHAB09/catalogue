<?php
// cree une promo
function insertPromo($db,$reduction,$debut,$fin){

    $sql= "INSERT INTO promotion  VALUES(DEFAULT,'$reduction','$debut','$fin');";
    $result = mysqli_query($db, $sql);
	return $result ? "L'insertion a réussie<br>" : "L'insertion a échouée: " . mysqli_error($db) . "<br>";
}