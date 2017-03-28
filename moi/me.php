<?php include("../style/entete.php"); ?>
	<div id="articles">​
		<article><h1>À propos de moi</h1>
			<p>Konki est un pseudo que j'utilise fréquemment sur le web et signifie persévérance.
				Je suis étudiant en pharmacie. Après une forte dépression suite à 2 PACES, le choix qui ne me convenait pas vraiment (je le veux maintenant) et le manque de sociabilité. J'ai voulu partagé mes cours et mon ressenti sur la vie grâce à internet car j'aime aussi bien l'informatique que les sciences humaines.
				<br><br>Je suis catholique. Je suis croyant surtout après ce que j'ai vécu et aussi parce que j'étais issu de parent catholique. Ma joie de vivre est en grande partie lié à ma conviction religieuse.
				<br><br>En plus des cours, j'aime la culture japonaise, en particulier les mangas. Je continue d'étudier le japonais en autodidact.
				<br>J'aime aussi la natation et certains jeux.
				<br><br>Mais surtout j'aime ce qui est juste et bon en l'occurence les principes de vie transcrit dans la Bible.
				<br><br>Bref j'aime la vie !
			</p>
		</article>
<?php
		$req_article = "SELECT id, titre, contenu, date, Class FROM news WHERE Class = 'moi' ORDER BY ID LIMIT 10";
		$dataset_article = mysqli_query($con, $req_article) or die($req_article."<br />\n".mysqli_error());

		while ($article = mysqli_fetch_array($dataset_article)){
?>
			<article>
				<h1><?php echo htmlspecialchars($article['titre']); ?></h1>
				<p><?php echo nl2br($article['contenu']); ?><br /></p>
				<p style="text-align:center;">
					<?php echo htmlspecialchars($article['date']); ?>
					  ..... Catégorie : <?php echo htmlspecialchars($article['Class']); ?>  .....  
					<em><a href="/cestki/style/commentaires.php?billet=<?php echo $article['id'];?>">Commentaires
					</a></em>
				</p>
			</article>
<?php
		} // Fin de la boucle des articles
?>
	</div>

<?php include("../style/footer.php"); ?>
