<?php

// ----------> CREATE <--------------

//cree un produit
function insertProduit($db,$modele,$top_vente,$marque,$descriptif,$prix){
    $sql= "INSERT INTO produits (modele, top_vente, marque, descriptif, prix) VALUES('$modele','$top_vente','$marque','$descriptif','$prix');";
    $result = mysqli_query($db, $sql);
	return $result ? "L'insertion a réussie<br>" : "L'insertion a échouée: " . mysqli_error($db) . "<br>";
}
//var_dump(insertProduit($db,'Heart Bio Hack','0','Puma','lorem ipsum', '58.50'));

//cree une categorie
function insertCategorie($db,$nom){
    $sql= "INSERT INTO categorie (nom) VALUES('$nom');";
    $result = mysqli_query($db, $sql);
	return $result ? "L'insertion a réussie<br>" : "L'insertion a échouée: " . mysqli_error($db) . "<br>";
}

//cree une image
function insertImages($db,$legend,$URL,$produit_idproduit){
    $sql= "INSERT INTO images (legend,URL,produits_idproduit) VALUES('$legend','$URL','$produit_idproduit');";
    $result = mysqli_query($db, $sql);
	return $result ? "L'insertion a réussie<br>" : "L'insertion a échouée: " . mysqli_error($db) . "<br>";
}

// cree un magasin

function insertMagasin($db,$nom,$rue,$numero,$codepostal,$ville,$longitude,$latitude){

    $sql= "INSERT INTO magasin (nom,rue,numero,codepostal,ville,longitude,latitude) VALUES('$nom','$rue','$numero','$codepostal','$ville','$longitude','$latitude');";
    $result = mysqli_query($db, $sql);
	return $result ? "L'insertion a réussie<br>" : "L'insertion a échouée: " . mysqli_error($db) . "<br>";
}










// ----------> READ <--------------


// affichage classé par nom
function selectsNoms($db){
    $sql="SELECT * FROM produits ORDER BY nom ASC";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);;
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}

// affichage classé par prix
function selectsprix($db){
    $sql="SELECT * FROM produits ORDER BY prix ASC";
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
    JOIN produits_has_categorie AS PHC ON P.id= PHC.produits_id 
    JOIN categorie AS C ON C.idcategorie = PHC.categorie_id ORDER BY C.nom ; ";

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
function selectCategorie($db,$id){
    $sql="SELECT *
    FROM produits AS P 
    JOIN produits_has_categorie ON produits_id  = P.id JOIN categorie AS C ON categorie_id = idcategorie  WHERE idcategorie= $id; ";

    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}
//var_dump(selectCategorie($db,5));

//affichage en fonction du between
function selectsEntre($db){
    $sql="SELECT * FROM produits WHERE prix BETWEEN  50 AND 60";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}
//var_dump((selectsEntre($db)));

//affichage d'un produit
function selectDetail($db,$id){
    $sql="SELECT descriptif FROM produits WHERE id = $id";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_assoc($result);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}
//var_dump(selectNom($db,2));

//affichage le nombre de produit que je possede
function selectCount($db){
    $sql= "SELECT COUNT(*) AS nb FROM produits";
    $recup=mysqli_query($db,$sql);
    $data=mysqli_fetch_assoc($recup);
    return $data;
}
//var_dump(selectCount($db));

//affichage le nombre de produit d'une categorie
function selectCountCat($db,$id){
    $sql= "SELECT COUNT(*) AS nb FROM produits JOIN produits_has_categorie ON produits_id = produits.id JOIN categorie ON categorie_id = idcategorie WHERE idcategorie = $id";
    $recup=mysqli_query($db,$sql);
    $data=mysqli_fetch_assoc($recup);
    return $data['nb'];
}
//var_dump(selectCountCat($db,3));

//affichage le nombre d'image en fonction de produit
function selectALLCountImage($db,$id){
    $sql= "SELECT COUNT(*) AS nbImage FROM produits JOIN images ON produits_idproduit = idproduit WHERE idproduit=$id";
    $recup=mysqli_query($db,$sql);
    $data=mysqli_fetch_assoc($recup);
    return $data ['nbImage'];
}
//var_dump(selectAllCountImage($db,1));
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
//affichage de la liste des pointes de vente 
function selectsMagasin ($db){
    $sql="SELECT * FROM magasin  ORDER BY ville ASC";
    $result= mysqli_query($db,$sql);
    if($result){
        $data= mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $data;
    }else{
        return "Le point de vente n'éxiste plus:" . mysqli_error($db) . "<br>";
    }
}

//affichage de la liste des pointes de vente avec id
function selectsMagasinById ($db,$idMagasin){
    $sql="SELECT * FROM magasin WHERE idMagasin='$idMagasin' ORDER BY ville ASC";
    $result= mysqli_query($db,$sql);
    if($result){
        $data= mysqli_fetch_all($result,MYSQLI_ASSOC);
        return $data;
    }else{
        return "Le point de vente n'éxiste plus:" . mysqli_error($db) . "<br>";
    }
}

// ----------> UPDATE <--------------

// modification du produit
function updateProduit($db, $modele, $marque,$id) {
	$sql = "UPDATE produits SET modele = '$modele', marque = '$marque' WHERE id = $id";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La mise à jour a réussie<br>" : "La mise à jour a échouée: " . mysqli_error($db) . "<br>";
}

// modification d'une cathegorie
function updateCategorie($db, $nom,$id) {
	$sql = "UPDATE categorie SET nom = $nom WHERE id = $id";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La mise à jour a réussie<br>" : "La mise à jour a échouée: " . mysqli_error($db) . "<br>";
}

// modification d'une image
function updateImage($db, $legend,$URL,$id) {
	$sql = "UPDATE images SET legend = $legend, URL = $URL WHERE id = $id";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La mise à jour a réussie<br>" : "La mise à jour a échouée: " . mysqli_error($db) . "<br>";
}

// modification d'un point de vente
function updateMagasin($db, $nomMagasin,$id) {
	$sql = "UPDATE magasin SET nom = $nomMagasin WHERE idMagasin = $idMagasin";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La mise à jour a réussie<br>" : "La mise à jour a échouée: " . mysqli_error($db) . "<br>";
}


// ----------> DELETE <--------------


// supprimer un produit
function deleteProduit($db, $id) {
	$sql = "DELETE FROM produits WHERE id = $id";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La suppression a réussi<br>" : "La suppression a raté: " . mysqli_error($db) . "<br>";
}

//supprimer une categorie
function deleteCategorie($db, $id) {
	$sql = "DELETE FROM categorie WHERE id = $id";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La suppression a réussi<br>" : "La suppression a raté: " . mysqli_error($db) . "<br>";
}

//supprimer une image

function deleteImage($db, $id) {
	$sql = "DELETE FROM images WHERE id = $id";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La suppression a réussi<br>" : "La suppression a raté: " . mysqli_error($db) . "<br>";
}


//supprimer un point de vente
function deleteMagasin($db, $idMagasin) {
	$sql = "DELETE FROM magasin WHERE idMagasin = $idMagasin";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La suppression a réussi<br>" : "La suppression a raté: " . mysqli_error($db) . "<br>";
}


//--------------> Promotion <-----------------

// affichage en evidence

function selectEvidence($c,$id){
    $sql="UPDATE `produits` SET `produit_evident`= 0 WHERE `produit_evident`= 1"; // remettre tout les produit evidence a 0
    $sql1="UPDATE `produits` SET `produit_evident`= 1 WHERE idproduit= $id;" ;// cree un produit en evidence
    $result=mysqli_query($c,$sql);
    $result2=mysqli_query($c,$sql1);
    if($result&&$result2) {
        return "L'update à reussie";
    } else {
        return "Un des updates a échoué: " . mysqli_error($c) . "<br>";
    }
}




//cree un produits en promo
function promotion($c, $reduction, $debut, $fin, $produits_idproduit){
    $sql="INSERT INTO `promotion` VALUES (NULL, $reduction, '$debut', '$fin', $produits_idproduit)";
    $result=mysqli_query($c,$sql);
    if($result) {
        return "La promotion a été insérée";
    } else {
        return "La promotion n'a pu être insérée: " . mysqli_error($c) . "<br>";
    }

}





