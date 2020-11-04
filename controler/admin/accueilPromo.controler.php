<?php
require_once "../model/crud.php";
include "../model/paginationModel.php";


$promo = selectsPromo($db);
count($promo); // Permet de savoir le nombre d'éléments dans un array
//var_dump ($promo);

require_once "../view/admin/accueilPromo.php";