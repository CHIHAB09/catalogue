<?php
// fonction qui nous retourne un texte ou un mot aurait pu être coupé en supprimant le dernier espace trouvé
function cutTheTextModel($descriptif){
    // longueur du texte reçu
    $descripLength = strlen($descriptif);
    // on trouve le dernier espace dans ce $text
    $dernierEspace = strrpos($descriptif, " ");
    // on coupe la chaine avec ce dernier caractère
    $final = substr($descriptif, 0,$dernierEspace);
    return $final;
}