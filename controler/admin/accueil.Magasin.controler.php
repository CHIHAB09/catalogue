<?php
require_once "../model/accueil.Magasin.Model.php";
require_once "../model/paginationModel.php";

$magasins = selectsMagasin($db);
count($magasins); // Permet de savoir le nombre d'éléments dans un array