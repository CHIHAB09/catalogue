<?php
require_once "../model/accueilProduit.Model.php";

$produit = selectsAllProduits($db);
count($produit); // Permet de savoir le nombre d'éléments dans un array
//var_dump($produit);








include "../view/admin/accueilProduit.php";