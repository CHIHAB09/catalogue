<?php
require_once "../model/crud.php";
include "../model/paginationModel.php";


$user = selectsUser($db);
count($user); // Permet de savoir le nombre d'éléments dans un array
//var_dump ($user);

require_once "../view/admin/accueilUser.php";