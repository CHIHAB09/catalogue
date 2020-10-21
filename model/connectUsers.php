<?php

// connect function
function connectUser($db, $pseudo, $pwd)
{
    // traitement des données
    $pseudo = htmlspecialchars(strip_tags(trim($pseudo)), ENT_QUOTES);
    $pwd = htmlspecialchars(strip_tags(trim($pwd)), ENT_QUOTES);
    // request
    $sql = "SELECT idUtilisateur, u.pseudo
	FROM utilisateurs u
    
    WHERE u.pseudo='$pseudo' AND u.pwd='$pwd'";
    $recup = mysqli_query($db, $sql) or die(mysqli_error($db));

    if (mysqli_num_rows($recup)) {
        return mysqli_fetch_assoc($recup);
    } else {
        return false;
    }

}

// find all user
function AllUser($connect)
{
    $sql = "SELECT idUtilisateur, pseudo FROM utilisateurs ORDER BY pseudo ASC;";
    $request = mysqli_query($connect, $sql);
    return mysqli_fetch_all($request, MYSQLI_ASSOC);
}