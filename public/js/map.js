
/*
// on initialise la carte et on charge les tuille et on regle les zoom
let mymap = L.map('mymap').setView([50.8466, 4.3528], 12);
// On charge les "tuiles"
L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
    attribution: 'Map tiles by <a href="http://stamen.com/%22%3EStamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0%22%3ECC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright%22%3EOpenStreetMap</a> contributors',
    minZoom: 5,
    maxZoom: 20
}).addTo(mymap);
*/


// on personnalise le marqueur
let icone = L.icon({
    iconUrl: "../public/image/icone/iconMagasin.png",
    iconSize: [50,50],
    iconAnchor:[25,50],
    popupAnchor: [0, -50]
})

/*
// boucle qui parcour les differents magasin dans le tableau plus hauts
for(let shop of shops){
    console.log(shop.latitude,shop.longitude,shop.nom);
    // on cree le marqueur et on l attribut un popup
    let marker = L.marker([shop.latitude, shop.longitude])// .addTo(mymap); inutile lors de l'utilisation des clusters
        .addTo(mymap);
        marker.bindPopup("<h1>"+shop+"</h1>");
        //mymap.addLayer(marker); // on ajoute le marqueur au groupe
        
        
        
}*/

   /*//on regroupe les marker dans le leaflet
    let groupe = new L.featureGroup(tabMarker);

    //on adapte le zoom du groupe ( pad la  taille du zzom)
    mymap.fitBounds(groupe.getBounds().pad(0.5));

    mymap.addLayer(marker);*/





    let mymap = L.map('mymap').setView([50.8466, 4.3528], 12);
// On charge les "tuiles"
L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
    attribution: 'Map tiles by <a href="http://stamen.com/%22%3EStamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0%22%3ECC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright%22%3EOpenStreetMap</a> contributors',
    minZoom: 5,
    maxZoom: 14
}).addTo(mymap);

for( let shop of shops){
    console.log(shop.latitude,shop.longitude);

    //on crée le marqueur et on lui attribue une popup
    let marqueur = L.marker([shop.longitude, shop.latitude],{icon:icone}).addTo(mymap);
    marqueur.bindPopup("<h1>"+shop.nom+"</h1>"+"<h2>"+shop.rue+"</h2>"+"<h3>"+shop.numero+"</h3>"+"<h4>"+shop.codepostal+"</h4>"+"<h5>"+shop.ville+"</h3>");
}