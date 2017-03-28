//on construit le tableau avec les carrés bleus
var table = document.createElement('table'), ligne, colonne, nbcolonne=25, lvl = 0, keyCodePress ;

for (var i = 1; i < 25; i++)
{
	ligne = document.createElement('tr');
	for (var j = 0; j < nbcolonne; j++) {
		colonne = document.createElement('td');
		colonne.className = 'blue';
		ligne.appendChild(colonne);
		if (j < 10) {
			colonne.id = i + '0' + j;
		} 
		else {
			colonne.id = i + '' + j;
		}
	}
	table.appendChild(ligne);
}
document.getElementById('marbox').appendChild(table);

//les deux premiers champs du tableaux correspondent au départ et à l'arrvivé
//d'abord couleur du block, puis ligne (ex:12 pour douxième lignes), enfin colonne
var t1 = [2, 361, 10402, 10524, 11623, 11510, 10601, 12002, 10113, 30108, 80112, 20110, 50115, 72415, 62424, 50624, 40502];

for (var i = 2, couleur, t, c = t1.length ; i < c ; i++) {
	t = t1[i] % 10000; 
	couleur = (t1[i] - t)/10000;
	if (couleur == 1) document.getElementById(t).className = 'green';
	else if (couleur == 2) document.getElementById(t).className = 'white';
	else if (couleur == 3) document.getElementById(t).className = 'black';
	else if (couleur == 4) document.getElementById(t).className = 'b1';
	else if (couleur == 5) document.getElementById(t).className = 'b2';
	else if (couleur == 6) document.getElementById(t).className = 'b3';
	else if (couleur == 7) document.getElementById(t).className = 'b4';
	else if (couleur == 8) document.getElementById(t).className = 'purple';
}

//on initialise la position de départ (carré rouge) : nb qui varie et r1 constant du niveau
var nb = t1[0], r1 = nb;
//on place l'arrivée (carré jaune)
var goal = t1[1];

//on colore les carrés rouge et jaune
var balle = document.getElementById('marbox').getElementsByTagName('td');
balle[nb].className = 'red';  
balle[goal].className = 'yellow';
//r sert à se rappeler de la couleur du bloc d'avant
//je me suis un peu trompé quand j'ai associé les nombres aux chiffres
var r;

//pour recolorer les bloc qui doivent rester
function boucle_fleche () { 
	//pour ne pas faire un autre mouvement pendant l'animation
	document.removeEventListener('keypress', listen_touche, false);
	document.getElementById('click_recommencer').removeEventListener('click', click_recommencer, false);
	document.getElementById('click_gauche').removeEventListener('click', click_gauche, false);
	document.getElementById('click_haut').removeEventListener('click', click_haut, false);
	document.getElementById('click_bas').removeEventListener('click', click_bas, false);
	document.getElementById('click_droite').removeEventListener('click', click_droite, false);
	//r=1 on affiche pas le bloc rouge donc le bloc reste de la même couleur
	if (r == 1) r = 0;
	else if (r == 6) balle[nb].className = 'white', r = 0;
	else if (r == 2) balle[nb].className = 'b1', r = 0;
	else if (r == 3) balle[nb].className = 'b2', r = 0;
	else if (r == 4) balle[nb].className = 'b3', r = 0;
	else if (r == 5) balle[nb].className = 'b4', r = 0;
	else balle[nb].className = 'blue';
}

function gagne () {
	lvl++;
	alert('Vous avez réussit à passer le lvl '+lvl);
	lvlsuivant ();
}

function lvlsuivant () {

	for (var i = 0, c = balle.length; i < c; i++) {
		balle[i].className = 'blue';
	}
	tt = [		[102, 1511, 10402, 10524, 11623, 11510, 10601, 12002, 10113, 30108, 80112, 20110, 50115, 72415, 62424, 50624, 40502], 
				[1622, 1618, 10805, 11500, 11406, 10720, 10919, 11718],
				[714, 410, 10308, 10520, 10314, 10415, 10416, 10411, 10606, 10805, 10917, 
					11212, 11221, 11316, 11504, 11619, 11810, 11816, 11907, 12013, 11914, 11915],
				[709, 415, 10308, 11909, 11806, 10810, 10616, 10717, 11414, 10416, 10607, 11516, 10515]
			];
	t1 = tt[lvl];

	for (var i = 2, couleur, t, c = t1.length ; i < c ; i++) {
		t = t1[i] % 10000; 
		couleur = (t1[i] - t)/10000;
		if (couleur == 1) document.getElementById(t).className = 'green';
		else if (couleur == 2) document.getElementById(t).className = 'white';
		else if (couleur == 3) document.getElementById(t).className = 'black';
		else if (couleur == 4) document.getElementById(t).className = 'b1';
		else if (couleur == 5) document.getElementById(t).className = 'b2';
		else if (couleur == 6) document.getElementById(t).className = 'b3';
		else if (couleur == 7) document.getElementById(t).className = 'b4';
		else if (couleur == 8) document.getElementById(t).className = 'purple';
	}
	nb = nbcolonne * (t1[0]-(t1[0]%100))/100 - nbcolonne + (t1[0]%100);
	r1 = nb;
	goal = nbcolonne * (t1[1]-(t1[1]%100))/100 - nbcolonne + (t1[1]%100);
	
	balle[nb].className = 'red';
	balle[goal].className = 'yellow'; 
}

//pour voir l'animation on a un setTimeout donc il faut que le listener soit off
function gauche() {
	boucle_fleche();
	if (nb%nbcolonne == 0) {
		balle[nb].className = 'red';
		if (nb == goal) gagne();
		document.addEventListener('keypress', listen_touche, false);
		listen_touche_visuel();
	}
	else if (balle[nb-1].className == 'blue') {
		nb--;
		balle[nb].className = 'red';
		setTimeout(gauche, 30);
	}
	else if (balle[nb-1].className == 'green' 
				|| balle[nb-1].className == 'b2' 
				|| balle[nb-1].className == 'b3') {
		balle[nb].className = 'red';
		if (nb == goal) gagne();
		document.addEventListener('keypress', listen_touche, false);
		listen_touche_visuel();
	}
	else if (balle[nb-1].className == 'white') { 
		r = 6;
		nb--;
		balle[nb].className = 'red';
		document.addEventListener('keypress', listen_touche, false);
		listen_touche_visuel();
	}
	else if (balle[nb-1].className == 'black') {
		balle[nb-1].className = 'blue';
		balle[nb].className = 'red';
		if (nb == goal) gagne();
		document.addEventListener('keypress', listen_touche, false);
		listen_touche_visuel();
	}
	else if (balle[nb-1].className == 'purple') {
		r = 1;
		nb = nb - 2;
		setTimeout(gauche, 30);
	}
	else if (balle[nb-1].className == 'b1') {
		r = 2;
		nb--;
		balle[nb].className = 'red';
		setTimeout(bas, 30);
	}
	else if (balle[nb-1].className == 'b4') {
		r = 5;
		nb--;
		balle[nb].className = 'red';
		setTimeout(haut, 30);
	}
	else if (balle[nb-1].className == 'yellow') {
		r = 1;
		nb--;
		balle[nb].className = 'yellow';
		setTimeout(gauche, 30);
	}
}

function bas () {
	boucle_fleche();
	if (nb+nbcolonne >= balle.length) {
		balle[nb].className = 'red';
		if (nb == goal) gagne();
		document.addEventListener('keypress', listen_touche, false)
		listen_touche_visuel();
	}
	else if (balle[nb+nbcolonne].className == 'blue') {
		nb +=nbcolonne;
		balle[nb].className = 'red';
		setTimeout(bas, 30);
	}
	else if (balle[nb+nbcolonne].className == 'green' 
				|| balle[nb+nbcolonne].className == 'b1' 
				|| balle[nb+nbcolonne].className == 'b2') {
		balle[nb].className = 'red';
		if (nb == goal) gagne();
		document.addEventListener('keypress', listen_touche, false);
		listen_touche_visuel();
	}
	else if (balle[nb+nbcolonne].className == 'white') { 
		r = 6;
		nb +=nbcolonne;
		balle[nb].className = 'red';
		document.addEventListener('keypress', listen_touche, false);
		listen_touche_visuel();
	}
	else if (balle[nb+nbcolonne].className == 'black') {
		balle[nb+nbcolonne].className = 'blue';
		balle[nb].className = 'red';
		if (nb == goal) gagne();
		document.addEventListener('keypress', listen_touche, false);
		listen_touche_visuel();
	}
	else if (balle[nb+nbcolonne].className == 'purple') {
		r = 1;
		nb = nb - 2;
		setTimeout(gauche, 30);
	}
	else if (balle[nb+nbcolonne].className == 'b3') {
		r = 4;
		nb +=nbcolonne;
		balle[nb].className = 'red';
		setTimeout(gauche, 30);
	}
	else if (balle[nb+nbcolonne].className == 'b4') {
		r = 5;
		nb +=nbcolonne;
		balle[nb].className = 'red';
		setTimeout(droite, 30);
	}
	else if (balle[nb+nbcolonne].className == 'yellow') {
		r = 1;
		nb +=nbcolonne;
		balle[nb].className = 'yellow';
		setTimeout(bas, 30);
	}	
}

function haut () {
	boucle_fleche();
	if (nb-nbcolonne < 0) {
		balle[nb].className = 'red';
		if (nb == goal) gagne();
		document.addEventListener('keypress', listen_touche, false)
		listen_touche_visuel();
	}
	else if (balle[nb-nbcolonne].className == 'blue') {
		nb -=nbcolonne;
		balle[nb].className = 'red';
		setTimeout(haut, 30);
	}
	else if (balle[nb-nbcolonne].className == 'green'
				|| balle[nb-nbcolonne].className == 'b3' 
				|| balle[nb-nbcolonne].className == 'b4') {
		balle[nb].className = 'red';
		if (nb == goal) gagne();
		document.addEventListener('keypress', listen_touche, false);
		listen_touche_visuel();
	}
	else if (balle[nb-nbcolonne].className == 'white') { 
		r = 6;
		nb -=nbcolonne;
		balle[nb].className = 'red';
		document.addEventListener('keypress', listen_touche, false);
		listen_touche_visuel();
	}
	else if (balle[nb-nbcolonne].className == 'black') {
		balle[nb-nbcolonne].className = 'blue';
		balle[nb].className = 'red';
		if (nb == goal) gagne();
		document.addEventListener('keypress', listen_touche, false);
		listen_touche_visuel();
	}
	else if (balle[nb-nbcolonne].className == 'purple') {
		r = 1;
		nb = nb - 2;
		setTimeout(gauche, 30);
	}
	else if (balle[nb-nbcolonne].className == 'b1') {
		r = 2;
		nb -=nbcolonne;
		balle[nb].className = 'red';
		setTimeout(droite, 30);
	}
	else if (balle[nb-nbcolonne].className == 'b2') {
		r = 3;
		nb -=nbcolonne;
		balle[nb].className = 'red';
		setTimeout(gauche, 30);
	}
	else if (balle[nb-nbcolonne].className == 'yellow') {
		r = 1;
		nb -=nbcolonne;
		balle[nb].className = 'yellow';
		setTimeout(haut, 30);
	}
}

function droite () {
	boucle_fleche();

	if (nb%nbcolonne == nbcolonne-1) {
		balle[nb].className = 'red';
		if (nb == goal) gagne();
		document.addEventListener('keypress', listen_touche, false)
		listen_touche_visuel();
	}
	else if (balle[nb+1].className == 'blue') {
		nb++;
		balle[nb].className = 'red';
		setTimeout(droite, 30);
	}
	else if (balle[nb+1].className == 'green'
				|| balle[nb+1].className == 'b1' 
				|| balle[nb+1].className == 'b4') {
		balle[nb].className = 'red';
		if (nb == goal) gagne();
		document.addEventListener('keypress', listen_touche, false);
		listen_touche_visuel();
	}
	else if (balle[nb+1].className == 'white') { 
		r = 6;
		nb++;
		balle[nb].className = 'red';
		document.addEventListener('keypress', listen_touche, false);
		listen_touche_visuel();
	}
	else if (balle[nb+1].className == 'black') {
		balle[nb+1].className = 'blue';
		balle[nb].className = 'red';
		if (nb == goal) gagne();
		document.addEventListener('keypress', listen_touche, false);
		listen_touche_visuel();
	}
	else if (balle[nb+1].className == 'purple') {
		r = 1;
		nb = nb + 2;
		setTimeout(droite, 30);
	}
	else if (balle[nb+1].className == 'b2') {
		r = 3;
		nb++;
		balle[nb].className = 'red';
		setTimeout(bas, 30);
	}
	else if (balle[nb+1].className == 'b3') {
		r = 4;
		nb++;
		balle[nb].className = 'red';
		setTimeout(haut, 30);
	}
	else if (balle[nb+1].className == 'yellow') {
		r = 1;
		nb++;
		balle[nb].className = 'yellow';
		setTimeout(droite, 30);
	}
}

function recommencer () {
	var lvlmoins = lvl -1;
	lvlsuivant();
}

// avec les touches directionnelles
var listen_touche = function listen_touche(e) {
	e.getPreventDefault();
	
	//touche entrée
	if (e.keyCode == 13) recommencer();
		
	if (e.keyCode == 37) gauche();

	if (e.keyCode == 38) haut();

	if (e.keyCode == 40) bas();

	if (e.keyCode == 39) droite();
};

var listen_touche_visuel = function listen_touche_visuel () {
	document.getElementById('click_recommencer').addEventListener('click', click_recommencer, false);
	document.getElementById('click_gauche').addEventListener('click', click_gauche, false);
	document.getElementById('click_haut').addEventListener('click', click_haut, false);
	document.getElementById('click_bas').addEventListener('click', click_bas, false);
	document.getElementById('click_droite').addEventListener('click', click_droite, false);
};

// avec les boutons visuels
var click_recommencer = function click_recommencer () { recommencer(); };
var click_gauche = function click_gauche () { gauche(); };
var click_haut = function click_haut () { haut(); };
var click_bas = function click_bas () { bas(); };
var click_droite = function click_droite () { droite(); };

document.getElementById('marbox').addEventListener('mouseover', function () {
	document.addEventListener('keypress', listen_touche, false);
}, false);
document.getElementById('marbox').addEventListener('mouseout', function () {
	document.removeEventListener('keypress', listen_touche, false);
}, false);

document.getElementById('click_recommencer').addEventListener('click', click_recommencer, false);
document.getElementById('click_gauche').addEventListener('click', click_gauche, false);
document.getElementById('click_haut').addEventListener('click', click_haut, false);
document.getElementById('click_bas').addEventListener('click', click_bas, false);
document.getElementById('click_droite').addEventListener('click', click_droite, false);
