<?php
require_once "../model/public/catalogue.model.php";
require_once "../model/pagination.model.php";


 $currentPage = (isset($_GET['pagination'])&&!empty($_GET['pagination'])) ? intval(filter_var(strip_tags($_GET["pagination"]),FILTER_SANITIZE_STRING,FILTER_SANITIZE_SPECIAL_CHARS)) : 1;

//var_dump($currentPage);


//var_dump($argumentLimit);

$categories=selectsCategories($db);
//prix maximum
$prixmax=prixMax($db);
// creation url
$recup_url="";

if(isset($_GET['recherche'])&&$_GET['recherche']==="ok"){
    $categ=[];
    if(!empty($_GET['categories'])){
        $i=0;
        foreach($_GET['categories'] AS $cat){
            $categ[$i]=$cat;
            $i++;
        }
    }
    $prixMin= (empty($_GET['prixMin'])) ? 0 : $_GET['prixMin'];
    $prixMax= (empty($_GET['prixMax'])) ? $prixmax['prix'] : $_GET['prixMax'];

            foreach($categ AS $cat){
                $recup_url.="&categories[$cat]=$cat";
            }
            $recup_url.="&prixMin=$prixMin&prixMax=$prixMax&recherche=ok";
    //nb total de produit
    $nbProd=selectSomeProduit($db,$categ,$prixMin,$prixMax);
    //nombre de page par parge
    $nbPerPage=6;
    $nbPage= ceil($nbProd/$nbPerPage);
    // creation du commencement avec le LIMIT's value with $currentPage value and $nbPerPage
    $argumentLimit = $nbPerPage*($currentPage-1);
            
    // function
    $recupProdPage=SomeWithPagination($db,$categ,$prixMin,$prixMax,$argumentLimit,$nbPerPage);
    
}else{ 
    //nb total de produit
    $nbProd=selectCountProduit($db);
    //nombre de page par parge
    $nbPerPage=6;
    $nbPage= ceil($nbProd/$nbPerPage);
    // creation du commencement avec le LIMIT's value with $currentPage value and $nbPerPage
    $argumentLimit = $nbPerPage*($currentPage-1);
    // chargement de tous les produits avec la pagination
    $recupProdPage = AllProduitsWithPagination($db,$argumentLimit,$nbPerPage);
}


//tous les produits avec leur caracteristique
//$produit = selectsAllProduits($db);

// chargement pagination
$pagination = paginationModel($nbProd, $currentPage, $nbPerPage,  "pg=Catalogue", "pagination",$recup_url);




include "../view/public/catalogue.view.php";