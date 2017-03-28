var element = document.getElementById('robo');
element.addEventListener('click', function() {
	
	var userEntry, calcul;
	var alea10 = Math.floor(Math.random() * 10);
	var aleat10 = Math.floor(Math.random() * 10);
	var alea3 = Math.floor(Math.random() * 3);
	
	var t1 = ['un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf', 'dix'];
	var t2 = ['moins', 'plus', 'fois'];

	var intero = t1[alea10] + ' ' + t2[alea3] + ' ' + t1[aleat10];
	
	if (alea3 === 0) calcul = (alea10 +1) - (aleat10 +1);
	else if (alea3 === 1) calcul = (alea10 +1) + (aleat10 +1);
	else if (alea3 === 2) calcul = (alea10 +1) * (aleat10 +1);
	
	function numb(nb){
		if (isNaN(nb) || nb < -9 || 100 < nb) return 'Veuillez entrer le nombre entier correcte compris entre -9 et 100.';
		else if (calcul === nb) return "Vous avez raison, c'était bien égal à " + calcul;
		else return "ce n'est pas bon, c'était "+ calcul;
	}
	
	userEntry = prompt(intero+'\nIndiquez le résultat en chiffre sans espace (ex : dix fois deux = 20) :')
		alert( numb( parseInt(userEntry, 10) ) );
	

}, false);
