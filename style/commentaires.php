<?php session_start(); ?>
<?php include("entete.php"); //il y a div id="bloc_page" qui n'est pas fermé ?>
<?php include("connexion.php"); ?>
	<div id="articles">
<?php
		$billet = $_GET['billet'];
		$req_article = $bdd->query("SELECT id, titre, contenu FROM news WHERE id = '$billet'");

		while ($article = $req_article->fetch())
		{
?>
		<article>
			<h1><?php echo htmlspecialchars($article['titre']); ?></h1>
			<p><?php echo nl2br($article['contenu']); ?></p>
		
			<h2>Commentaires</h2>
<?php 
			if(!empty($_GET['non'])){
					echo'<p style="color:red; font-size:2.0em;">C\'est pour laisser un message que vous êtes ici !</p>';
				} 
?>
			<form action="commentaires_post.php?billet=<?php echo $article['id']; ?>" method="post">
				<p>
					<label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" 
						placeholder="Votre pseudo" size="20" maxlength="10" /><br />
					<p style="text-align:center;">
						<textarea name="message" id="message" placeholder="Entrez votre message ici." rows="10" cols="80"></textarea><br /><br />
						<input type="button" value="Prouvez que vous n'êtes pas un robo et Envoyez votre message" id="robo" onclick="numb();" />
					</p>
				</p>
			</form>
<?php
			}
			$req_com = $bdd->query(
				"SELECT pseudo, message AS date_commentaire
				FROM commentaires WHERE id_article = '$billet'
				ORDER BY date_commentaire"
			);

			while ($com = $req_com->fetch()){
?>
				<p><strong><?php echo htmlspecialchars($com['pseudo']); ?></strong>
					le <?php echo $com['date_commentaire']; ?>
				</p><p><?php echo nl2br(htmlspecialchars($com['message'])); ?></p>
<?php
			}	
			$get = 'billet='.$billet;
?>
		</article>
	</div>
<script src="numb.js"></script>
<?php include("footer.php"); ?>
