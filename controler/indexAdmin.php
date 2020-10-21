<?php
require_once "../model/deconnexion.php";
require_once "../model/crud.php";



// on veut se déconnecter
if(isset($_GET['pg'])&&$_GET['pg']=="deconnexion"){
    disconnectModel();
    header("Location: ./");
    exit;
}

//existence de la connexion valide login admin
if(isset($_SESSION['notresession'])&& $_SESSION['notresession']===session_id()) { 
    echo "saluttttttttttttt";
}  