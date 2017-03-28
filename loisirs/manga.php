<?php include("../style/entete.php"); ?>
	<div id="articles">
<?php
		$req_article = "SELECT id, titre, contenu, date FROM news WHERE Class='manga' ORDER BY ID DESC LIMIT 0, 10";
		$dataset_article = mysqli_query($con, $req_article) or die($req_article."<br />\n".mysql_error());

		while ($article = mysqli_fetch_array($dataset_article)){
?>
			<article><h1><?php echo htmlspecialchars($article['titre']); ?></h1>
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
