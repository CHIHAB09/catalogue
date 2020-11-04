<?php

// ----------> CREATE <--------------





// cree un magasin

function insertMagasin($db,$nom,$rue,$numero,$codepostal,$ville,$longitude,$latitude){

    $sql= "INSERT INTO magasin  VALUES(DEFAULT,'$nom','$rue','$numero','$codepostal','$ville','$longitude','$latitude');";
    $result = mysqli_query($db, $sql);
	return $result ? "L'insertion a réussie<br>" : "L'insertion a échouée: " . mysqli_error($db) . "<br>";
}
// ----------> READ <--------------

// affichage classé par id
function selectsProduitById($db,$idproduit){
    
    $sql="SELECT * FROM produits Where idproduit = $idproduit";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_assoc($result);;
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
    
}
// affichage classé par id
function selectsUserById($db,$iduser){
    
    $sql="SELECT * FROM utilisateurs Where iduser = '$iduser'";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_assoc($result);;
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
    
}

// affichage classé par model
function selectsProduit($db){
    
    $sql="SELECT * FROM produits ORDER BY modele ASC";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);;
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
    
}
// affichage classé par image
function selectsImageById($db,$idimage){
    $sql="SELECT * FROM images 
    WHERE idimage = '$idimage'";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_assoc($result);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}


// affichage classé par image
function selectsImage($db){
    $sql="SELECT * FROM images ORDER BY URL ASC";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
// tout de promotion
function selectsPromo($db){
    $sql="SELECT reduction,debut,fin FROM promotion ";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}
// tout de user
function selectsUser($db){
    $sql="SELECT * FROM utilisateurs ";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}
// tous sur les produits
function selectsAllProduits($db,$idproduit){
    $sql="SELECT * 
    FROM produits P 
    JOIN produits_has_categorie AS PHC ON P.idproduit= PHC.produits_id 
    JOIN categorie AS C ON C.idcategorie = PHC.categorie_id
    LEFT JOIN images AS I ON I.produits_idproduit= P.idproduit  
    WHERE P.idproduit = '$idproduit' ; ";

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
        $data= mysqli_fetch_assoc($result);
        return $data;
    }else{
        return "Le point de vente n'éxiste plus:" . mysqli_error($db) . "<br>";
    }
}

// ----------> UPDATE <--------------
// modif tous sur le produit
// tous sur les produits
function updateAllProduits($db,$idproduit,$model,$produitEvident,$descriptif,$prix,$genre,$legend,$URL){
    $sql="UPDATE produits P 
    JOIN produits_has_categorie AS PHC ON P.idproduit= PHC.produits_id 
    JOIN categorie AS C ON C.idcategorie = PHC.categorie_id
    JOIN images AS I ON I.produits_idproduit= P.idproduit
    SET modele = '$model', produit_evident = '$produitEvident', marque ='$marque', descriptif ='$descriptif', prix = '$prix', genre = '$genre', legend = '$legend', URL = '$URL'
    Where idproduit = '$idproduit'
    AND P.idproduit= PHC.produits_id
    AND C.idcategorie= PHC.categorie_id
    AND I.produits_idproduit= P.idproduit;";

    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
    }
}
// modification du produit
function updateProduit($db,$id,$model,$produitEvident,$marque,$descriptif,$prix) {
	$sql = "UPDATE produits SET modele = '$model',produit_evident = '$produitEvident', marque = '$marque',descriptif = '$descriptif',prix = '$prix' WHERE idproduit = '$id'";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La mise à jour a réussie<br>" : "La mise à jour a échouée: " . mysqli_error($db) . "<br>";
}

// modification d'une cathegorie
function updateCategorie($db, $genre,$id) {
	$sql = "UPDATE categorie SET genre = '$genre' WHERE idcategorie = '$id'";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La mise à jour a réussie<br>" : "La mise à jour a échouée: " . mysqli_error($db) . "<br>";
}

// modification d'une image
function updateImage($db, $legend,$URL,$idimage) {
	$sql = "UPDATE images SET legend = $legend, URL = $URL WHERE idimage = $idimage";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La mise à jour a réussie<br>" : "La mise à jour a échouée: " . mysqli_error($db) . "<br>";
}
// modification d'une user
function updateUser($db, $nom,$prenom,$pseudo,$pwd,$iduser) {
	$sql = "UPDATE utilisateurs SET nom = '$nom', prenom = '$prenom', pseudo = '$pseudo', pwd = '$pwd' WHERE iduser = '$iduser'";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La mise à jour a réussie<br>" : "La mise à jour a échouée: " . mysqli_error($db) . "<br>";
}

// modification d'un point de vente
function updateMagasin($db,$idMagasin, $nomMagasin,$rue,$numero,$cdp,$ville,$long,$lat) {
	$sql = "UPDATE magasin SET nom = '$nomMagasin', rue = '$rue', numero = '$numero', codepostal = '$cdp', ville= '$ville', longitude = '$long', latitude= '$lat' WHERE idMagasin = $idMagasin";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La mise à jour a réussie<br>" : "La mise à jour a échouée: " . mysqli_error($db) . "<br>";
}


// ----------> DELETE <--------------


// supprimer un produit
function deleteProduit($db, $idproduit) {
	$sql = "DELETE FROM produits WHERE idproduit = $idproduit";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La suppression a réussi<br>" : "La suppression a raté: " . mysqli_error($db) . "<br>";
}
// supprimer un user
function deleteUser($db, $iduser) {
	$sql = "DELETE FROM utilisateurs WHERE iduser = $iduser";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La suppression a réussi<br>" : "La suppression a raté: " . mysqli_error($db) . "<br>";
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
	

//supprimer une image

function deleteImage($db, $idimage) {
	$sql = "DELETE FROM images WHERE idimage = $idimage";
	
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





