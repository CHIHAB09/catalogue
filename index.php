<?php

// ouverture de session
session_start();

//appel des model qu on a besoin
require_once "public/config.php";

//connexion à la db.
$db= mysqli_connect(DB_HOST,DB_USER,DB_PWD,DB_NAME,DB_PORT) OR die ("Echec de la connexion");
// initialisation de caractere a la db.
mysqli_set_charset($db,DB_CHARSET);


//appel au requete
require_once "model/crud.php";




?>