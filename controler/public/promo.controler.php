<?php
require_once "../model/public/promo.model.php";

$promos= selectsAllProduitsPromo($db);
$evidents=selectsAllProduitsEvident($db);
//var_dump($promos);

//var_dump($evidents);
include "../view/public/promo.php";