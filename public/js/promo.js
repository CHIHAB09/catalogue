function promo(prix,reduction){
    return (prix - (prix*reduction/100))
};

let prixElems = document.querySelectorAll(".prix");

console.log(prixElems);

for (let prixElem of prixElems){
        
    let prixdebase= prixElem.dataset.prix;
    let reduc=prixElem.dataset.promo;
    if(reduc){
        let prixPromo = promo(prixdebase,reduc);
        prixElem.insertAdjacentHTML("afterend","<h3 class='prixPromo'>Prix avec la ristourne:"+prixPromo+"€</h3>");
    }
}