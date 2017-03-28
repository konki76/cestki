<?php include("../style/entete.php"); ?>
	<div id="articles">
		
		<article>

<?php
			$UE = $_GET['UE'];

			$req_max = $bdd->query("SELECT count(id) FROM $UE");
			$max = $req_max->fetch();

			$rand = mt_rand(1, $max[0]);
			$req_qcm = $bdd->query("SELECT id, front, intitulé, img FROM $UE WHERE id = $rand ");

			while ($qcm = $req_qcm->fetch())
			{
?>
				<p style="text-align:center;"><?php echo $qcm['img']; ?></p>
				<?php if(!empty($qcm['intitulé'])) { echo '<p>'.$qcm['intitulé'].'<br /><br />'; } ?>
				<?php if(!empty($qcm['front'])) { echo $qcm['front'].'<br /></p>'; } ?>
			
					<form action="/cestki/cours/qcm_rep.php?UE=<?php echo $UE ?>&id=<?php echo $qcm['id']; ?>" method="post">
						<p style="text-align:center;"><input type="submit" value="VRAI" name="VRAI"/>
						<input type="submit" value="FAUX" name="FAUX"/></p>
					</form>
<?php
			}
			$get = 'UE='.$UE;
?>

		</article>
	</div>

<?php include("../style/footer.php"); ?>
