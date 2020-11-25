<?php
require_once "../model/public/promo.model.php";

$promos= selectsAllProduitsPromo($db);
$produitEvidents=selectsAllProduits($db);
var_dump($promos);


include "../view/public/promo.php";