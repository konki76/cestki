<article><h1>Apprendre les noms des molécules chimiques</h1>

<?php

	$req_CO = "SELECT id, nom, commentaire
		FROM COimage ORDER BY ID";
	$dataset_CO = mysql_query($req_CO) or die($req_CO."".mysql_error());

	while($CO = mysql_fetch_array($dataset_CO)) {
?>
		<a  class="kanjihover" href="/pharmacie/pharmacie.php?CO=<?php echo $CO['nom']; ?>">
			<strong><?php echo $CO['nom'].' '; ?> </strong>
			<span>
				<img src="/images/chimie-orga/CO<?php echo $CO['nom']; ?>.jpg"  />
				<br><?php echo $CO['commentaire']; ?>
			</span>
		</a>
<?php
	}
?>	

</article>
