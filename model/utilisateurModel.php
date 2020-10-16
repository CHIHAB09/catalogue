<?php
// connect function
function connectUtilis($c,$login,$pwd){

    // traitement des données avec les verification de securiter
    $login = htmlspecialchars(strip_tags(trim($login)),ENT_QUOTES);
    $pwd = htmlspecialchars(strip_tags(trim($pwd)),ENT_QUOTES);
    
    // requete
    $sql = "SELECT id, pseudo
	FROM utilisateurs
    WHERE pseudo='$login' AND pwd='$pwd';";
    $recup = mysqli_query($c,$sql) or die(mysqli_error($c));

    if(mysqli_num_rows($recup)){
        return mysqli_fetch_assoc($recup);
    }else{
        return false;
    }

}

