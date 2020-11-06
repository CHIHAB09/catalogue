<?php

// cree un magasin
function insertMagasin($db,$nom,$rue,$numero,$codepostal,$ville,$longitude,$latitude){

    $sql= "INSERT INTO magasin  VALUES(DEFAULT,'$nom','$rue','$numero','$codepostal','$ville','$longitude','$latitude');";
    $result = mysqli_query($db, $sql);
	return $result ? "L'insertion a réussie<br>" : "L'insertion a échouée: " . mysqli_error($db) . "<br>";
}