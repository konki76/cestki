<?php include("../style/entete.php"); ?>

	<div id="articles">
		
		<article>
<?php 
			$UE = $_GET['UE'];
			$id = $_GET['id'];
			$req_rep = $bdd->query("SELECT front, intitulé, VF, back, img FROM $UE WHERE id = $id");

			while ($rep = $req_rep->fetch())
			{
?>
				<p style="text-align:center;"><?php echo $rep['img']; ?></p>
				<p><?php if(!empty($rep['intitulé'])) { echo $rep['intitulé'].'<br /><br />'; } ?>
					<?php if(!empty($rep['front'])) { echo $rep['front'].'<br />'; } ?><hr />
				</p>
				<?php $VRAI = " "; $FAUX = " ";
				if(isset($_POST['VRAI'])) {$VRAI = $_POST['VRAI'];}
				if(isset($_POST['FAUX'])) {$FAUX = $_POST['FAUX'];}
				if($VRAI == $rep['VF']){
					echo '<p style="text-align:center; color:green; text-shadow: white 1px 1px 3px, white -1px 1px 3px, white -1px -1px 3px, white 1px -1px 3px;">'.$rep['VF'].'</p>'; 
				}
				elseif($FAUX == $rep['VF']){
					echo '<p style="text-align:center; color:green; text-shadow: white 1px 1px 3px, white -1px 1px 3px, white -1px -1px 3px, white 1px -1px 3px;">'.$rep['VF'].'</p>'; 
				} 
				elseif($FAUX != $rep['VF']){
					echo '<p style="text-align:center; color:red; text-shadow: white 1px 1px 3px, white -1px 1px 3px, white -1px -1px 3px, white 1px -1px 3px;">'.$rep['VF'].'</p>'; 
				}else { echo $rep['VF']; }
				?>
				<?php echo '<p>'.$rep['back'].'<br /></p>'; ?>
				<p style="text-align:center;">
					<a class="qcm" href="/cestki/cours/qcm.php?UE=<?php echo $UE ?>">suivant</a>
				</p>
<?php
			}
				$get = 'UE='.$UE.'&id='.$id;

?>
		</article>
	</div>
<?php include("../style/footer.php"); ?>

