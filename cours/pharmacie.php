<?php include("../style/entete.php"); ?>
	<div id="articles">

		<article>
			<p>J'ai une dropbox où je mets à disposition tout mes cours : pas les droits, vous pouvez m'envoyer un message pour avoir le lien.
			<br><br>J'ai fait pour certains cours des "résumés" assez dense. Entre guillement car je mets grosso modo tout le cours, par contre je change la formulation de certaines phrases et j'utilise quelques abréviations pour qu'il y ai le moins de blanc possible. Les grands châpitres sont en gras soulignés et les notions importantes soulignées, globalement que du noir et blanc. Presque que tout est sous forme de tiret pour faciliter l'indentation. Si vous voyez des erreurs énorme vous pouvez m'envoyer un message pour que je le corrige. 
				<br><br>Pour les pdf, je les ai généralement regroupé en un seul fichier et j'ai ajouté des notes directement sur les diapos. Pareil s'il y a une faute grave, faîtes le moi savoir.
				<br><br>J'ai modifié l'apparence de certain pdf et j'ai créé des fichier présentation .odg avec LibreOffice. Ils sont modifiables avec ce même logiciel. Générallement j'ai aussi créé des pdf à partir de ces fichiers qui peuvent être annotés, plus complet que le fichier .odg original.
				<br><br>J'en profite aussi pour préciser que j'ai scanné toutes les annales de 2015 et de 2014. Et j'ai créer un fichier texte en passant toutes les images par un OCR. Ce serait vraiment super si on se partageait le travail pour corriger les annales, pareil envoyer moi un message pour contribuer.
			</p>
		</article>
		<article><h1>Chimie-Thérapeuthique en image</h1>
		<div id="image" style="text-align:center;"></div>

<?php

	$req_ImgHover = "SELECT id, nom, commentaire, categorie
		FROM ImgHover WHERE categorie='chimie-thera' ORDER BY ID  ";
	$dataset_ImgHover = mysqli_query($con, $req_ImgHover) or die($req_CT."".mysqli_error());

	while($CT = mysqli_fetch_array($dataset_ImgHover)) {
?>
		<span class="ImgHover"  id ="<?php echo $CT['nom']; ?>">
			<strong><?php echo $CT['nom'].' '; ?> </strong>
			<span>
				<img src="/cestki/images/chimie-thera/CT<?php echo $CT['nom']; ?>.jpg"  />
				<br><?php echo $CT['commentaire']; ?>
			</span>
		</span>

<?php
	}
?>	
		</article>
		<article><h1>Chimie-Organique en image</h1>
		<div id="image" style="text-align:center;"></div>

<?php

	$req_ImgHover = "SELECT id, nom, commentaire, categorie
		FROM ImgHover WHERE categorie='chimie-orga' ORDER BY ID  ";
	$dataset_ImgHover = mysqli_query($con, $req_ImgHover) or die($req_CO."".mysqli_error());

	while($CO = mysqli_fetch_array($dataset_ImgHover)) {
?>
		<span class="ImgHover"  id ="<?php echo $CO['nom']; ?>">
			<strong><?php echo $CO['nom'].' '; ?> </strong>
			<span>
				<img src="/cestki/images/chimie-orga/CO<?php echo $CO['nom']; ?>.jpg"  />
				<br><?php echo $CO['commentaire']; ?>
			</span>
		</span>

<?php
	}
?>	
		</article>
		<article><h1>Biologie végétal en image</h1>
		<div id="image" style="text-align:center;"></div>

<?php

	$req_ImgHover = "SELECT id, nom, commentaire, categorie
		FROM ImgHover WHERE categorie='bota' ORDER BY ID  ";
	$dataset_ImgHover = mysqli_query($con, $req_ImgHover) or die($req_BO."".mysqli_error());

	while($BO = mysqli_fetch_array($dataset_ImgHover)) {
?>
		<span class="ImgHover"  id ="<?php echo $BO['nom']; ?>">
			<strong><?php echo $BO['nom'].' '; ?> </strong>
			<span>
				<img src="/cestki/images/botanique/BO<?php echo $BO['nom']; ?>.jpg"  />
				<br><?php echo $BO['commentaire']; ?>
			</span>
		</span>

<?php
	}
?>	
		</article>
	</div>

<?php include("../style/footer.php"); ?>
