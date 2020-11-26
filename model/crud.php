<?php

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

// modification du produit
function updateProduit($db,$id,$model,$produitEvident,$marque,$descriptif,$prix) {
	$sql = "UPDATE produits SET modele = '$model',produit_evident = '$produitEvident', marque = '$marque',descriptif = '$descriptif',prix = '$prix' WHERE idproduit = '$id'";
	
	$result = mysqli_query($db, $sql);
	return $result ? "La mise à jour a réussie<br>" : "La mise à jour a échouée: " . mysqli_error($db) . "<br>";
}

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

//--------Image--------

//affichage le nombre d'image en fonction de produit
function selectALLCountImage($db,$id){
    $sql= "SELECT COUNT(*) AS nbImage FROM produits JOIN images ON produits_idproduit = idproduit WHERE idproduit=$id";
    $recup=mysqli_query($db,$sql);
    $data=mysqli_fetch_assoc($recup);
    return $data ['nbImage'];
}
//var_dump(selectAllCountImage($db,1));


//---------PROMO--------

// tout de promo
function selectsPromo($db){
    $sql="SELECT * FROM promotion 
    ORDER BY reduction";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    } else {
        return "La sélection a échouée: " . mysqli_error($db) . "<br>";
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
