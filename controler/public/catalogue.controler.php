<?php
require_once "../model/public/catalogue.model.php";
require_once "../model/pagination.model.php";
//tous les produits avec leur caracteristique
//$produit = selectsAllProduits($db);
//nb total de produit
$nbProd=selectCountProduit($db);
//var_dump($nbProd);
//nombre de page par parge
$nbPerPage=6;
$nbPage= ceil($nbProd/$nbPerPage);
//var_dump($nbPage);

 $currentPage = (isset($_GET['pagination'])&&!empty($_GET['pagination'])) ? intval(filter_var(strip_tags($_GET["pagination"]),FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS)) : 1;

//var_dump($currentPage);

// creation du commencement avec le LIMIT's value with $currentPage value and $nbPerPage
$argumentLimit = $nbPerPage*($currentPage-1);
//var_dump($argumentLimit);


// chargement de tous les produits avec la pagination
$recupProdPage = AllProduitsWithPagination($db,$argumentLimit,$nbPerPage);

// chargement pagination
$pagination = paginationModel($nbProd, $currentPage, $nbPerPage,  "pg=Catalogue", "pagination");


//var_dump (selectsAllProduits($db));




include "../view/public/catalogue.view.php";