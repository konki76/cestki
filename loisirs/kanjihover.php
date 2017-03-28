<?php
$plus100 = 100;
	if(!empty($_GET['aff'])) {
		$plus100 = 100 + $_GET['aff'];
		$req_kanji = "SELECT kanji, kunyomi, onyomi, sens, categorie 
			FROM kanji2 ORDER BY ID ASC LIMIT 0, $plus100";
		$dataset_kanji = mysqli_query($con, $req_kanji) or die($req_kanji."".mysqli_error());
?>
		<article><h1>1684 kanjis</h1><p>
<?php
		while($kanji2 = mysqli_fetch_array($dataset_kanji)){
	?>
			<a  class="kanjihover" href="/cestki/japon/kanji.php?k=<?php echo $kanji2['kanji']; ?>">
				<strong> <?php echo $kanji2['kanji'].' '; ?> </strong>
				<span>
						<strong><?php echo $kanji2['kanji']; ?></strong><br />
						Kun : <?php echo $kanji2['kunyomi']; ?><br />
						On : <?php echo $kanji2['onyomi']; ?><br />
						Sens : <?php echo $kanji2['sens']; ?><br />
						<?php echo $kanji2['categorie']; ?>
				</span>
			</a>
<?php
		}
	} 
	else {
		$req_kanji2 = "SELECT kanji, kunyomi, onyomi, sens, categorie 
			FROM kanji2 ORDER BY ID ASC LIMIT 0, 100";
		$dataset_kanji2 = mysqli_query($con, $req_kanji2) or die($req_kanji2."".mysqli_error());
?>
		<article><h1>1684 kanjis</h1>
			<p>
<?php
		while($kanji2 = mysqli_fetch_array($dataset_kanji2)){
?>
				<a  class="kanjihover" href="/cestki/japon/kanji.php?k=<?php echo $kanji2['kanji']; ?>">
					<strong> <?php echo $kanji2['kanji'].' '; ?> </strong>
					<span>
							<strong><?php echo $kanji2['kanji']; ?></strong><br />
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
				<a style="color:white;" href="/cestki/japon/japonais.php?aff=<?php echo $plus100; ?>">+100</a>
				<br /><br />
				<form action="/cestki/japon/kanji.php" method="get">
					<label for="kanji">Quel kanji cherchez-vous ? : 
					</label><input type="text" name="k" size="1" maxlength="1" />
					<input type="submit" value="Envoyer"/>
				</form>
			</p>
		</article>
