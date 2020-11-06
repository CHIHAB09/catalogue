<?php
// tout de categorie
function selectsCateg($db){
    $sql="SELECT * FROM categorie ";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}

// affichage des produits classé par categorie
function selectsCategories($db){
    $sql="SELECT * 
    FROM produits P 
    JOIN produits_has_categorie AS PHC ON P.idproduit= PHC.produits_id 
    JOIN categorie AS C ON C.idcategorie = PHC.categorie_id ORDER BY P.modele ; ";

    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}
//var_dump(selectsCategories($db));

// affichage les produits d'une categorie
function selectCategorieByID($db,$idcategorie){
    $sql="SELECT *
    FROM categorie 
    WHERE idcategorie= '$idcategorie'; ";

    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_assoc($result);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}
//var_dump(selectCategorie($db,5));

//affichage le nombre de produit d'une categorie
function selectCountCat($db,$id){
    $sql= "SELECT COUNT(*) AS nb FROM produits JOIN produits_has_categorie ON produits_id = produits.id JOIN categorie ON categorie_id = idcategorie WHERE idcategorie = $id";
    $recup=mysqli_query($db,$sql);
    $data=mysqli_fetch_assoc($recup);
    return $data['nb'];
}
//var_dump(selectCountCat($db,3));

// affichage de toute la categorie
function selectAllCategories($db){
    $sql="SELECT * FROM categorie ORDER BY nom ASC";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);;
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}

// modification d'une cathegorie
function updateCategorie($db, $genre,$id) {
	$sql = "UPDATE categorie SET genre = '$genre' WHERE idcategorie = '$id'";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La mise à jour a réussie<br>" : "La mise à jour a échouée: " . mysqli_error($db) . "<br>";
}

//supprimer une categorie
function deleteCategorie($db, $idcategorie) {
    mysqli_begin_transaction($db);
	$sql = mysqli_query($db,"DELETE FROM produits_has_categorie WHERE categorie_id = '$idcategorie';");
    $sql1 = mysqli_query($db,"DELETE FROM categorie WHERE idcategorie = '$idcategorie';");
    if($sql && $sql1){
        mysqli_commit($db);
        return true;
    }else{
        mysqli_rollback($db);
        return false;
    }
}
	?>

<?php
// Sélection de tous les categories pour le menu (et pour d'autres cas)
function recupAllCateg($db){
    $sql="SELECT * FROM categorie;";
    $request = mysqli_query($db,$sql) or die(mysqli_error($db));
    // si on a au moins un résultat
    if(mysqli_num_rows($request)){
        // retourne un tableau indexé contenant des tableaux associatifs
        return mysqli_fetch_all($request,MYSQLI_ASSOC);
    }else{
        // tableau vide
        return [];
    }
}
// Sélection d'une categorie par son ID
function recupCategById($db,$idcategorie){
    $idcategorie = (int) $idcategorie;
    $sql="SELECT * FROM categorie WHERE idcategorie=$idcategorie;";
    $request = mysqli_query($db,$sql) or die(mysqli_error($db));
    // si on a au moins un résultat
    if(mysqli_num_rows($request)){
        // retourne un tableau associatif si on a 1 résultat
        return mysqli_fetch_assoc($request);
    }else{
        // tableau vide
        return [];
    }
}
// Compte le nombre de produit dans la categ par son ID
function recupProduitByIdFromCateg($db,$categorie){
    $id = (int) $id;
    $sql="SELECT COUNT(P.idproduit) AS nbPr
	FROM produits P 
    INNER JOIN produits_has_categorie PHC
		ON PHC.produits_id = P.idproduit
	INNER JOIN categorie C
		ON PHC.categorie_id = C.idcategorie
    WHERE C.idcategorie=$idcategorie;";
    $request = mysqli_query($db,$sql) or die(mysqli_error($db));
    // si on a au moins un résultat
    if(mysqli_num_rows($request)){
        // retourne un numérique avec le nombre d'articles dans une rubrique
        return mysqli_fetch_assoc($request)['nbPr'];
    }else{
        // envoie 0
        return 0;
    }
}

// Charge * les produits avec categorie et images (optionnal) mais avec 200 caracters de "descriptif" avec pagination LIMIT Into the categorie selected by ID
function articlesLoadResumePaginationByIdRubriques($db,$idcategorie,$begin,$nbperpage=10){
    $idcategorie = (int) $idcategorie;
    $begin = (int) $begin;
    $nbperpage = (int) $nbperpage;
    $req = "SELECT P.idproduit, P.modele, LEFT(P.descriptif,200) AS modele, P.prix, C.genre, I.legend , 
GROUP_CONCAT(C.genre SEPARATOR '|||') AS genre, GROUP_CONCAT(I.legend SEPARATOR '|||') AS legend,

	(SELECT GROUP_CONCAT(C.idcategorie,'---',  C.genre SEPARATOR '|||')  FROM categorie C
		INNER JOIN produits_has_categorie PHC
			ON PHC.categorie_id = C.idcategorie 
        INNER JOIN produits Pr
			ON PHC.produits_id = PR.idproduit 
        WHERE PR.idproduit  = P.idproduit    
	) AS categ	
		
FROM produits P 
	INNER JOIN promotion Pro 
		ON Pro.produits_idproduit = P.idproduit
    LEFT JOIN  produits_has_produit PHC 
        ON PHC.produits_id = P.idproduit
    LEFT JOIN images I 
        ON I.idimage = P.idproduit  
    INNER JOIN categorie C
		ON PHC.categorie_id = C.idcategorie
    WHERE c.idcategorie= $idcategorie    
GROUP BY P.idproduit
ORDER BY P.prix DESC
LIMIT $begin, $nbperpage;";
    $recup = mysqli_query($db,$req) or die(mysqli_error($db));
    // si au moins 1 résultat
    if(@mysqli_num_rows($recup)){
        // on utilise le fetch all car il peut y avoir plus d'un résultat
        return mysqli_fetch_all($recup,MYSQLI_ASSOC);
    }
    // no result
    return false;
}

// Charge les categorie pour un produit via l'id du produit (la table many to many suffit pour cette requête)
function recupCategByIdFromProduit($db,$idproduit){
    $idarticle = (int) $idarticle;
    $sql="SELECT C.idcategorie, C.genre
FROM categorie C
INNER JOIN produits_has_categorie PHC
	ON PHC.categorie_id = C.idcategorie
WHERE PHC.produits_id = $idproduit;";
    $request = mysqli_query($db,$sql) or die(mysqli_error($db));
    // si on a au moins une categorie, on l'envoie (les) en tableau indexé contenant des tableaux associatifs
    return (mysqli_num_rows($request))? mysqli_fetch_all($request,MYSQLI_ASSOC):[];
}