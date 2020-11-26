
<?php
//affichage classé par id
function selectsProduitById($db,$idproduit){
    
    $sql="SELECT *, GROUP_CONCAT(I.`URL` SEPARATOR '||') AS images
    FROM produits P 
    LEFT JOIN promotion Pr ON Pr.produits_idproduit = P.idproduit
    LEFT JOIN images I ON I.produits_idproduit = P.idproduit
    LEFT JOIN produits_has_categorie AS PHC ON P.idproduit= PHC.produits_id 
    LEFT JOIN categorie AS C ON C.idcategorie = PHC.categorie_id
    WHERE idproduit = $idproduit
    GROUP BY P.idproduit ;";
    $result = mysqli_query($db, $sql);
    if($result) {
        $data = mysqli_fetch_assoc($result);
        return $data;
    } else {
        return false;
    }
    
}