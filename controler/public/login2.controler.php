<?php

//model

//code controller
if(isset($_SESSION['utilisateurs'])&& $_SESSION['utilisateurs']===session_id()){
  header("location:?admin=Accueil");
}


//appel vue

include "../view/public/login2.view.php";