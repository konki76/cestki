<?php include("../style/entete.php"); ?>

	<div id="articles">
		<article><h1>Présentation de la PACES</h1>
			C'est acronyme qui signifie Première Année Commune aux Études de Santé.<br>
			La PACES regroupe plusieurs filières : médecine, pharmacie, dentaire, sage-femme et kiné.<br>
			À l'issu du concours répartit en 2 semestre, les postulants se voient affecter un classement qui décidera de la filière choisie.<br>
			Lors du second semestre, on peut choisir l'option MOSFK (médecine, odontologie, sage-femme et kiné) ou l'option pharmacie. 
			On peut faire le choix de n'en suivre qu'une ou les deux options.<br><br>
			L'année de première année n'est pas facile, il y a beaucoup de connaissances à mémoriser et à savoir recracher le jour de l'examen.<br>
			C'est une année intense. Il ne faut pas s'y mettre au dernier moment pour les révisions.<br>
			Et il est presque obligatoire de s'entraîner régulièrement aux QCM.<br>
			C'est un concours stressant et nombreux sont ceux qui perdent pieds. 
			Mais soyez assuré qu'il y en a toujours un bon nombre qui sont encore assis à gratter comme des malades et qui vont être des obstacles à votre réussite.<br><br>
			Il y a tout de même un peu de fraternité mais le tout reste quand même bien fermé lorsqu'il s'agit de partagé ses cours.<br>
			C'est pourquoi, je mets ici le lien de ma dropbox de mes cours de PACES qui datent quand même un peu puisque j'ai fait 2 ans en 2013-2014.<br>
			Envoyez moi un message pour que je vous donne le lien, je vérifirais l'identité. Si vous ne me conaissze pas, tant pis pour vous.
			<br>Il y a aussi mes cours de pharmacie pour ceux que ça intéresse ^^
		</article>
		<article><h1>Choix QCM</h1>

			<p style="text-align=center;">
				<form method="get" action="qcm.php">
					Sur quelle matière voulez-vous vous entraîner ? 
					<select name="UE">
						<option value="UE1">UE1 Biochimie</option>
						<option value="UE2">UE2 Biologie</option>
						<option value="UE3">UE3 Physique</option>
						<option value="UE5">UE5 Anatomie</option>
						<option value="UE6">UE6 Pharmacologie</option>
						<option value="UE7">UE7 Santé-so, HDM, psycho</option>
						<option value="UEP">UEP Spécialité pharmacie</option>
					</select><br />
					<input type="submit" value="Envoyer" />
				</form>
			</p>

		</article>
	</div>

<?php include("../style/footer.php"); ?>
