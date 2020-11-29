function onLight(event) {
	let body = document.querySelector('body');
	let gallerie = document.querySelector('#floatingGallerie');
	let gallerieImg = document.querySelector('#gallerieImage');
	// this represents the clicked image
	let thumbSrc = this.src; 
	let originSrc = thumbSrc.replace("thumb", "origin");
	
	body.classList.add('lightbox');
	gallerie.style.display = "block";
	gallerieImg.src = originSrc;
	
	imageClassName = this.dataset.group;
	let thumbs = document.querySelectorAll("." + imageClassName);
	for (let i = 0; i < thumbs.length; i++) {
		if (thumbs[i].src === this.src) {
			console.log(thumbs[i].src, this.src);
			imageIndex = i;
			break;
		}
	}
	
	body.addEventListener('click', offLight);
	event.stopPropagation();
}

function offLight(event) {
	let body = document.querySelector('body');
	body.classList.remove('lightbox');
	let gallerie = document.querySelector('#floatingGallerie');
	gallerie.style.display = "none";
	
	body.removeEventListener('click', offLight);
}

window.onload = function setEventListener() {
	let thumbs = document.querySelectorAll(".clickableimage");
	for (thumb of thumbs) {
		thumb.addEventListener('click', onLight);
	}
	
	function giveSlideDirection(direction) {
		return function slide() {
			let images = document.querySelectorAll("." + imageClassName);
			if (direction === "droite") {
				imageIndex = imageIndex + 1 < images.length ? imageIndex + 1 : 0	
			}
			else if (direction === "gauche") {
				imageIndex = imageIndex - 1 >= 0 ? imageIndex - 1 : images.length - 1
			}

			let newSrc = images[imageIndex].src.replace("thumb", "origin");
			let gallerieImg = document.querySelector('#gallerieImage');
			gallerieImg.src = newSrc;
			event.stopPropagation();
		}
	}
	
	let gaucheArrow = document.querySelector('#gaucheArrow');
	gaucheArrow.addEventListener('click', giveSlideDirection("gauche"));
	
	let droiteArrow = document.querySelector('#droiteArrow');
	droiteArrow.addEventListener('click', giveSlideDirection("droite"));
}
