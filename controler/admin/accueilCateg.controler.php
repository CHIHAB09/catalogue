<?php
require_once "../model/accueilCateg.model.php";

$categ = selectsCategories($db);
count($categ); // Permet de savoir le nombre d'éléments dans un array
//var_dump ($categ);

include "../view/admin/accueilCateg.php";