<?php


function insertUser($db,$nom,$prenom,$pseudo,$pwd){

    $sql= "INSERT INTO utilisateurs  VALUES(DEFAULT,'$nom','$prenom','$pseudo','$pwd');";
    $result = mysqli_query($db, $sql);
	return $result ? "L'insertion a réussie<br>" : "L'insertion a échouée: " . mysqli_error($db) . "<br>";
}
