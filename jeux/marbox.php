<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
	#marbox tr { background-image: url("../js/bleu.png"); color: blue; border-collapse: collapse; }
	#marbox td { margin:0px; padding:0px; width:20px; height:20px; display:inline-block;}
	#marbox table { margin:auto; border-collapse: collapse; }
	.green {background-image: url("../js/vert.png"); color: green; }
	.red {background-image: url("../js/rouge.png"); color: red;}
	.blue { color: blue; background-image: url("../js/bleu.png");}
	.yellow {background: yellow; color: yellow;}
	.white {background: white; color: white;}
	.black {background: black; color: black;}
	.purple {background: purple; color: purple;}
	.b1 {background-image: url("../js/b1.png");}
	.b2 {background-image: url("../js/b2.png");}
	.b3 {background-image: url("../js/b3.png");}
	.b4 {background-image: url("../js/b4.png");}
	span:hover {
		color : red;
		text-shadow: yellow 1px 1px 3px, white -1px 1px 3px, white -1px -1px 3px, white 1px -1px 3px;
	}
</style>
</head>
<body onkeypress="keyCodePress = e.keyCode" >
<article><div id="aide" style="text-align:center;"><a href="/cestki/index.php">Chikai</a> 
	Je me suis amusé à faire un jeu qui ressemble à Orbox, je l'ai nommé Marbox ! 
	<br>Il y a encore très peu de cartes, si vous voulez en créez, envoyez moi un message sur la chatbox. Bon jeu !
	<br>Cliquer sur le texte pour afficher l'aide et double cliquer pour revenir sur la présentation.
	</div>
		<script>
			var aide = document.getElementById('aide');
			aide.addEventListener('click', function () {
				contenuAide = 'Le but du jeu est d\'atteindre le carré jaune en bougeant le carré rouge à l\'aide des touches directionnels (flèche haut / bas / gauche / droite). <br / >La touche entrée permet de remettre le jeu à zéros.';
				aide.innerHTML = contenuAide;
			}, false);
			aide.addEventListener('dblclick', function () {
				aide.innerHTML = "<a href='/index.php'>Chikai</a> Je me suis amusé à faire un jeu qui ressemble à Orbox, je l'ai nommé Marbox !<br>Il y a encore très peu de cartes, si vous voulez en créez, envoyez moi un message sur la chatbox. Bon jeu !";
			}, false);
		</script>
	<div id='marbox'></div>
	<p style="text-align:center">
		<span class="hover" id ="click_gauche">gauche</span>
		<span class="hover" id ="click_haut">haut</span>
		<span class="hover" id ="click_bas">bas</span>
		<span class="hover" id ="click_droite">droite</span>
		<span class="hover" id ="click_recommencer">recommencer</span>
	</p>
</article>

<script src="../js/marbox2.js"></script>
</body>
</html>
		
