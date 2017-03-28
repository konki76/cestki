<article style="width:95%">
	<div id="aide" style="text-align:center;"> 
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
		<span class="hover" id ="click_haut">haut</span><br>
		<span class="hover" id ="click_gauche">gauche</span>
		<span class="hover" id ="click_bas">bas</span>
		<span class="hover" id ="click_droite">droite</span><br>
		<span class="hover" id ="click_recommencer">recommencer</span>
	</p>
</article>

<script src="/cestki/js/marbox2.js"></script>

<footer>
			Site réalisé par <a href="/cestki/moi/me.php">Konki</a>
</footer>
</div> <!-- fin de bloc-page -->

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js <http://google-analytics.com/ga.js>' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-75010392-1");
pageTracker._trackPageview();
</script> 
</body>
</html>
