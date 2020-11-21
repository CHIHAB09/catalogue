/* Demarrer la vidéo */
function play(tempsEcoule){
    /* charger l'objet video dans une variable monfilm */
    var monfilm = document.getElementById("film1");
    /* demarrer la vidéo */
    monfilm.currentTime=tempsEcoule;
    monfilm.play();
}

/* Arreter ou mettre en pause la video */
function pause(){
    /* charger l'objet video dans une variable monfilm */
    var monfilm = document.getElementById("film1");
    /* stopper la video */
    monfilm.pause();
}