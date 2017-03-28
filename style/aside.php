
<aside>
	<p id="Profil">
		<a href="/cestki/moi/me.php">
			<img src="/cestki/images/konki.png" alt="Konki" />
		</a>
	</p>

<?php
	$req_titre = "SELECT id, titre,  date FROM news ORDER BY ID DESC LIMIT 0, 5";
	$dataset_titre = mysqli_query($con, $req_titre) or die($req_titre."<br />\n".mysql_error());


		while ($titre = mysqli_fetch_array($dataset_titre))
		{
?>
			<br>
			<div style="text-align:center;">
				<a href="/style/commentaires.php?billet=<?php echo $titre['id'];?>">
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
		<a href="/livredor/livre_dor.php">
			<img src="/images/livre-dor.png" alt="Des commentaires sur le site" />
		</a>
	</p>
</aside>
