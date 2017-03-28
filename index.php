<?php session_start(); ?>
<?php include("./style/connexion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        	<link rel="stylesheet" href="/cestki/style/chikai-v2.css" />
        	
 		<title>C'es KI</title>
	</head>
<body>
	<header>
		<div id="banniere_image"></div>
	</header>

	<nav>
		<ul id="menu"><li><a href="/cestki/index.php">Accueil</a></li>
			<li><a href="/cestki/moi/me.php">Moi</a></li>
			<li><a href="/cestki/catho/catho.php">Église</a></li>
			<li><a href="/cestki/cours/choix.php">Cours</a>
				<ul>
					<li><a href="/cestki/cours/pharmacie.php">Pharmacie</a></li>
					<li><a href="/cestki/cours/japonais.php">Japonais</a></li>
					<li><a href="/cestki/cours/tutoriels.php">Tutoriels</a></li>
					<li><a href="/cestki/cours/choix_qcm.php">PACES</a>
				</ul>
			</li>
			<li><a href="/cestki/loisirs/japon.php">Loisirs</a>
				<ul>
					<li><a href="/cestki/loisirs/manga.php">Manga</a>
					<li><a href="/cestki/jeux/marbox.php">Marbox</a></li>
				</ul>
			</li>
		</ul>
	</nav>
<div id="bloc_page">

<aside>
	<p id="Profil">
		<a href="/cestki/moi/me.php">
			<img src="/cestki/images/konki200.png" alt="Konki" />
		</a>
	</p>

<?php
	$req_titre = $bdd->query("SELECT id, titre,  date FROM news ORDER BY ID DESC LIMIT 0, 5");

		while ($titre = $req_titre->fetch())
		{
?>
			<br>
			<div style="text-align:center;">
				<a href="/cestki/style/commentaires.php?billet=<?php echo $titre['id'];?>">
					<?php echo htmlspecialchars($titre['titre']); ?> : <?php echo htmlspecialchars($titre['date']); ?>
				</a>
			</div>				
<?php
		} 
?>
<form method="post" action="traitement.php">
	<p>
		<label for="Articles">Choisissez votre article</label><br />
		<select name="Articles" id="Articles">
			<optgroup label="Cours">
				<option value="">PACES</option>
			</optgroup>
			<optgroup label="Religion">
				<option value="catho">Catholique</option>
			</optgroup>
			<optgroup label="Langue">
				<option value="jp">Japonais</option>
			</optgroup>
			<optgroup label="Loisirs">
				<option value="anime">Anime</option>
			</optgroup>
		</select>
	</p>
</form>
	<p id="livre-dor">
		<a href="/cestki/livredor/livre_dor.php">
			<img src="/cestki/images/livre-dor.png" alt="Des commentaires sur le site" />
		</a>
	</p>
</aside>


	<div id="articles">
<?php
		$req_article = $bdd->query("SELECT id, titre, contenu, date, Class FROM news ORDER BY ID DESC LIMIT 0, 3");

		while ($article = $req_article->fetch())
		{
?>
			<article>
				<h1><?php echo htmlspecialchars($article['titre']); ?></h1>
				<p><?php echo nl2br($article['contenu']); ?><br /></p>
				<p style="text-align:center;">
					<?php echo htmlspecialchars($article['date']); ?>
					  .....  Catégorie : <?php echo htmlspecialchars($article['Class']); ?>  .....  
					<em><a href="/cestki/style/commentaires.php?billet=<?php echo $article['id'];?>">Commentaires
					</a></em>
				</p>
				
			</article>
<?php
		} // Fin de la boucle des articles
?>

	</div>
<?php include("./style/footer.php"); ?>

