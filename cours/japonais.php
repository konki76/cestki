<?php include("../style/entete.php"); ?>

	<div id="articles">
		<article>
			<h1>La langue</h1>
			<p>Le japonais est une langue complexe qui nécessite pas mal d'apprentissage.
			C'est une langue composé de plusieurs alphabets : 2 en plus du romaji qui correspond à l'alphabet que nous utilisons.
			<ul><li>Les hiragana : pour les mots d'origine japonais</li>
				<li>Les katakana : pour tout ce qui importer de l'étranger</li>
			</ul>
			En plus, de ces deux alphabets comportant 46 caractère, il y a tout les kanji qui viennent du chinois. 
			Cependant ces synogrammes ne sont pas forcemment identique au chinois. 
			Bien que la lecture soit issu du chinois, le temps a fait changé la pronciation des mots.
			De même les mots étaient déjà utilisés dans la langue oral japonaise d'où les multiples prononciations pour un même signe.
			</p>
		</article>
		<article>
			<h1>Conversion de nombre en japonais !</h1>
			<p style="text-align:center;"><input id="clickme" type="submit" value="conversion"></input></p>
		</article>
		<article><h1>1684 kanjis</h1><p>
<?php
		$plus100 = 100;
	if(!empty($_GET['aff'])) {
			$plus100 = 100 + $_GET['aff'];
			$req_kanji = "SELECT kanji, kunyomi, onyomi, sens, categorie 
				FROM kanji2 ORDER BY ID ASC LIMIT 0, $plus100";
			$dataset_kanji = mysqli_query($con, $req_kanji) or die($req_kanji."".mysqli_error());

			while($kanji2 = mysqli_fetch_array($dataset_kanji))
			{
?>
				<a  id="<?php echo $kanji2['kanji']; ?>" 
					class="kanjihover" 
					href="/cestki/loisirs/kanji.php?k=<?php echo $kanji2['kanji']; ?>"
				>
					<strong> <?php echo $kanji2['kanji'].' '; ?> </strong>
					<span>
							<h1><?php echo $kanji2['kanji']; ?></h1><br />
							Kun : <?php echo $kanji2['kunyomi']; ?><br />
							On : <?php echo $kanji2['onyomi']; ?><br />
							Sens : <?php echo $kanji2['sens']; ?><br />
							<?php echo $kanji2['categorie']; ?>
					</span>
				</a>
<?php
			}
	} else 
	{
			$req_kanji2 = "SELECT kanji, kunyomi, onyomi, sens, categorie 
				FROM kanji2 ORDER BY ID ASC LIMIT 0, 100";
			$dataset_kanji2 = mysqli_query($con, $req_kanji2) or die($req_kanji2."".mysqli_error());

			while($kanji2 = mysqli_fetch_array($dataset_kanji2))
			{
?>
				<a  id="<?php echo $kanji2['kanji']; ?>" 
					class="kanjihover" 
					href="/cestki/loisirs/kanji.php?k=<?php echo $kanji2['kanji']; ?>"
				>
					<strong> <?php echo $kanji2['kanji'].' '; ?> </strong>
					<span>
							<h1><?php echo $kanji2['kanji']; ?></h1><br />
							Kun : <?php echo $kanji2['kunyomi']; ?><br />
							On : <?php echo $kanji2['onyomi']; ?>'<br />
							Sens : <?php echo $kanji2['sens']; ?><br />
							<?php echo $kanji2['categorie']; ?>
					</span>
				</a>
<?php
			}
	}
?>
		<a style="color:white;" href="/cestki/loisirs/japon.php?aff=<?php echo $plus100; ?>">+100</a>
		<br /><br />
		<form action="/cestki/loisirs/kanji.php" method="get">
			<label for="kanji">Quel kanji cherchez-vous ? : 
			</label><input type="text" name="k" size="1" maxlength="1" />
			<input type="submit" value="Envoyer"/>
		</form>

		</p></article>
	</div>

<script src="../js/nbconv.js"></script>
<?php include("../style/footer.php"); ?>
