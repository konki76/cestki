<?php include("../style/entete.php"); ?>

	<div id="articles">
		<article><h1>Introduction</h1>
			<p>
				Mon but est de faire part de mes réflexions sur des textes de la Bible ou bien de sujet en rapport avec la religion.
				<br />Vous trouverez ci-après les différents posts dans l'ordre chronologique de mes publications.
				<br />Bonne lecture !
			</p>
		</article>
<?php
		$req_article = "SELECT id, titre, contenu, date, Class FROM news WHERE Class='catho' ORDER BY ID LIMIT 10";
		$dataset_article = mysql_query($req_article) or die($req_article."<br />\n".mysql_error());

		while ($article = mysql_fetch_array($dataset_article)){
?>
			<article>
				<h1><?php echo htmlspecialchars($article['titre']); ?></h1>
				<p><?php echo nl2br($article['contenu']); ?><br /></p>
				<p style="text-align:center;">
					<?php echo htmlspecialchars($article['date']); ?>
					  .....  Catégorie : <?php echo htmlspecialchars($article['Class']); ?>  .....  
					<em><a href="/style/commentaires.php?billet=<?php echo $article['id'];?>">Commentaires
					</a></em>
				</p>
			</article>
<?php
		} // Fin de la boucle des articles
?>
	</div>
<?php include("../style/aside.php"); ?>
<?php include("../style/footer.php"); ?>
