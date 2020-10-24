<?php

// inserer un magasin
if (isset($_POST['submit'])) {
    $nomMagasin = filter_var($_POST['nomMagasin'],FILTER_VALIDATE_URL); 
    $rue = htmlspecialchars(strip_tags(trim($_POST['rue'])),ENT_QUOTES);
    $numero = htmlspecialchars(strip_tags(trim($_POST['numero'])),ENT_QUOTES);
    $cdp = htmlspecialchars(strip_tags(trim($_POST['cdp'])),ENT_QUOTES);
    $ville = htmlspecialchars(strip_tags(trim($_POST['ville'])),ENT_QUOTES);
    $long = htmlspecialchars(strip_tags(trim($_POST['long'])),ENT_QUOTES);
    $lat = htmlspecialchars(strip_tags(trim($_POST['lat'])),ENT_QUOTES);
    
    // si on a une erreur de type
    if(empty($nomMagasin)||empty($rue)||$numero||empty($cdp)||empty($ville)||empty($long)||empty($lat)===false){
        $message = "Erreur de type de données, veuillez recommencer";
    }else {
    insertMagasin($db, $_POST['nomMagasin'], $_POST['rue'], $_POST['numero'], $_POST['cdp'], $_POST['ville'], $_POST['long'], $_POST['lat']);
        //var_dump($_POST['submit']);
}
}

//modifier un magasin
//si le formulaire est envoyé , on ajoute l'existence de idLiens
if(isset($_GET['idMagasin'],$_POST['nomMagasin'],$_POST['rue'],$_POST['numero'],$_POST['cdp'],$_POST['ville'],$_POST['long'],$_POST['lat'])){
    // on traîte idliens en le transformant en entier si faux 0 => empty
$idLiens = (int) $_GET['idMagasin'];
//si un erreur vaudra "" => empty
$url = filter_var($_POST['url'],FILTER_VALIDATE_URL); 
$nomdusite = htmlspecialchars(strip_tags(trim($_POST['nomdusite'])),ENT_QUOTES);
$description = htmlspecialchars(strip_tags(trim($_POST['description'],'<p><a><img><br><strong><b><i><em>'),ENT_QUOTES));

// si on a une erreur de type (ajout de la vérification de $idliens)
if(empty($nomdusite)||empty($description)||$url===false||empty($idLiens)){
    $message = "Erreur de type de données, veuillez recommencer";
}else {  
     //sql-deviens un update! NE PAS OUBLIER LE WHERE SINON TOUS RISQUES DE CHANGER
    $sql = "UPDATE liens SET nomdusite='$nomdusite', url='$url', description='$description'
    WHERE idLiens=$idLiens;";
    //execution de la requete
     mysqli_query($db,$sql) or die(mysqli_error($db));
     // redirection
     header("Location: ?admin=crudliens&message=modif");
     
 }
}

 // on vérifie l'existence de la variable get id et que son contenu de type string ne contient que des numériques

if(isset($_GET['id'])&&ctype_digit($_GET['id'])){
// conversion en entier
$id = (int) $_GET['id'];

// préparation de la requête
$sql = "SELECT * FROM liens WHERE idLiens=$id";
// exécution de la requête
$recup = mysqli_query($db,$sql) or die(mysqli_error($db));
// si on trouve une ligne de résultat 1 vaut true
if(mysqli_num_rows($recup)){
    $liens = mysqli_fetch_assoc($recup);
    // mysqli_num_rows($recup) vaut 0 donc false
}else{
    $erreur = "Cet article n'existe déjà plus!";
}
// l'id n'existe pas ou n'est pas valide
}else{
$erreur ="Joue pas aves le feu !!!!";
}
