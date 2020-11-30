<?php
function paginationModel($nb_tot_prod,$current_page,$nb_per_page=6,$URL_VAR="",$name_get_pagination="pg",$recup_url){

    // création de la variable de sortie
    $sortie="";

    // pour obtenir le nombre total de page, on divise le nombre total d'éléments affichables $nb_tot_item par le nombre d'éléments affichables par page, le tout arrondit à l'entier supérieur ceil()
    $nb_pages = ceil($nb_tot_prod/$nb_per_page);

    // si on a qu'une seule page
    if($nb_pages<2){
        // on affiche une chaîne vide
        return $sortie;
    }

    $sortie.= "Page ";
    // on cree une boucle
    for($i=1;$i<=$nb_pages;$i++){
        // si on est sur la première page
        if($i==1){
            // si la première page est la page actuelle
            if($i==$current_page){
                $sortie .= "<< < ";
                // la première page n'est pas la page actuelle
            }else{
                // retour à la première ligne
                $sortie .= "<a href='?$URL_VAR&$name_get_pagination=$i". $recup_url. "'><<</a> ";
                // une page en arrière
                $sortie .= "<a href='?$URL_VAR&$name_get_pagination=".($current_page-1).$recup_url."'><</a> ";
            }
        }
        // si on est sur la page actuelle, pas besoin de lien, sinon on en met un
        $sortie .= ($i==$current_page)
            ? "$i "
            : "<a href='?$URL_VAR&$name_get_pagination=$i$recup_url'>$i</a> ";

        // si on est sur la dernière page
        if($nb_pages==$i){
            // si la page actuelle est la dernière page
            if($current_page==$i){
                $sortie.=" > >> ";
            }else{
                // page suivante
                $sortie.="<a href='?$URL_VAR&$name_get_pagination=".($current_page+1).$recup_url."'>></a> ";
                // dernière page
                $sortie.="<a href='?$URL_VAR&$name_get_pagination=$i$recup_url'>>></a> ";
            }
        }


    }
    return $sortie;
}