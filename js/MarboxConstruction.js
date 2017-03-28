//on construit le tableau avec les carrés bleus
var table = document.createElement('table'), ligne, colonne, nbcolonne=30, lvl = 1;

	for (var i = 0; i < 20; i++)
	{
		ligne = document.createElement('tr');
		for (var j = 0; j < nbcolonne; j++)
		{
			colonne = document.createElement('td');
			colonne.appendChild	(document.createTextNode('__'));
			ligne.appendChild(colonne);
			colonne.id = 'l' + i+ 'c' + j;
		}
		table.appendChild(ligne);
	}
   document.getElementById('marbox').appendChild(table);


	var nb = 30;
	var balle = document.getElementsByTagName('td');
	balle[nb].className = 'green'; 


var listen_touche = function listen_touche(e) {
if (e.keyCode == 13) { //touche entrée
	balle[nb].className = 'blue';
}
if (e.keyCode == 37) { //touche gauche
	nb = nb - 1;
	balle[nb].className = 'green'; 
}
if (e.keyCode == 40) { //touche bas 
	nb = nb + 30;
	balle[nb].className = 'green'; 
}
if (e.keyCode == 38) { //touche haut
	nb = nb - 30;
	balle[nb].className = 'green'; 
}
if (e.keyCode == 39) { //touche droite
	nb = nb + 1;
	balle[nb].className = 'green';
}
};//fin de la fonction listen_touche

document.getElementById('marbox').addEventListener('mouseover', function () {
	document.addEventListener('keypress', listen_touche, false);
}, false);



