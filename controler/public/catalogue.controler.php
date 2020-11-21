<?php
require_once "../model/public/catalogue.model.php";

$produit = selectsAllProduits($db);
//count($produit); // Permet de savoir le nombre d'éléments dans un array

//var_dump (selectsAllProduits($db));




include "../view/public/catalogue.view.php";