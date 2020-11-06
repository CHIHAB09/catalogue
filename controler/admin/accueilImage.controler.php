<?php
require_once "../model/accueilImage.model.php";
include "../model/paginationModel.php";


$image = selectsImage($db);
count($image); // Permet de savoir le nombre d'éléments dans un array
//var_dump ($categ);

require_once "../view/admin/accueilImage.php";