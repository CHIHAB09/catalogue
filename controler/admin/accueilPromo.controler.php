<?php
require_once "../model/accueilPromo.model.php";
include "../model/paginationModel.php";
$promo = selectsAllPromo($db);
$promo1 = selectsPromoProduit($db);
count($promo); // Permet de savoir le nombre d'éléments dans un array
//var_dump ($promo);

require_once "../view/admin/accueilPromo.php";