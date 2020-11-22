let magasins= {
    "Molenbeek-Saint-Jean":{"lat": 50.85, "lon": 4.3167},
    "Saint-Josse":{"lat": 50.85, "lon": 4.36667},
    "Schaerbeek": {"lat":50.867416, "lon":4.377298},
    "Bruxelles": {"lat":50.8466, "lon":4.3528}
};
//je cree un tableau vie pour les markers
let tabMarker = [];

// on initialise la carte et on charge les tuille et on regle les zoom
let mymap = L.map('mymap').setView([50.8466, 4.3528], 12);
// On charge les "tuiles"
L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
    attribution: 'Map tiles by <a href="http://stamen.com/%22%3EStamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0%22%3ECC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright%22%3EOpenStreetMap</a> contributors',
    minZoom: 5,
    maxZoom: 20
}).addTo(mymap);

//let marker = L.markerClusterGroup();

// on personnalise le marqueur
let icone = L.icon({
    iconUrl: "../icone/iconMagasin.png",
    iconSize: [50,50],
    iconAnchor:[25,50],
    popupAnchor: [0, -50]
})

// boucle qui parcour les differents magasin dans le tableau plus hauts
for(magasin in magasins){
    // on cree le marqueur et on l attribut un popup
    var marker = L.marker([magasins[magasin].lat, magasins[magasin].lon],
        {icon:icone})// .addTo(mymap); inutile lors de l'utilisation des clusters
        .addTo(mymap);
        /*marker.bindPopup("<h1>"+magasin+"</h1>");
        marker.addLayer(marker); // on ajoute le marqueur au groupe
        
        // on ajoute le marker au tableau
        tabMarker.push(marker);*/
        
    }

    /*//on regroupe les marker dans le leafletµ
    let groupe = new L.featureGroup(tabMarker);

    //on adapte le zoom du groupe ( pad la  taille du zzom)
    mymap.fitBounds(groupe.getBounds().pad(0.5));*/

    mymap.addLayer(marker);