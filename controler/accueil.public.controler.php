<?php
require_once "../model/public/accueil.model.php";

$promo = selectsAllPromo($db);







include "../view/public/accueil.public.php";