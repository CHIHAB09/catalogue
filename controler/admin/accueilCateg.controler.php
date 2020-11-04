<?php
require_once "../model/crud.php";
include "../model/paginationModel.php";


$categ = selectsCateg($db);
count($categ); // Permet de savoir le nombre d'éléments dans un array
//var_dump ($promo);

require_once "../view/admin/accueilCateg.php";