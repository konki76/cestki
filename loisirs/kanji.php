<?php include("../style/entete.php"); ?>
	<div id="articles">
		<?php 

			$kanji = $_GET['k'];
			$req_kanji2 = "SELECT kanji, kunyomi, onyomi, sens, categorie 
				FROM kanji2 WHERE kanji = '$kanji'
			";
			$dataset_kanji2 = mysqli_query($con, $req_kanji2) or die($req_kanji2."<br />\n".mysqli_error());

			while ($kanji2 = mysqli_fetch_array($dataset_kanji2))
			{
				?>
				<article><p>
					<h1><?php echo $kanji2['kanji']; ?></h1><table>
					<tr><td>Kun : </td><td><?php echo $kanji2['kunyomi']; ?></td></tr>
					<tr><td>On : </td><td><?php echo $kanji2['onyomi']; ?></td></tr>
					<tr><td>Sens : </td><td><?php echo $kanji2['sens']; ?></td></tr>
					<tr><td><?php echo $kanji2['categorie']; ?></td></tr>
				</table></p></article>
		<?php
			}
			$get = 'k='.$kanji;
		?>
	</div>
<?php include("../style/footer.php"); ?>

