<?php
include("header.php");
include("db_config.php");
?>
</br></br></br></br></br></br></br></br></br></br>
<h2> Mon profil </h2>
</br>
</br></br>
<?php

	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	
	$userid=$_SESSION["USERID"];
	$SQL="SELECT * FROM profil WHERE cid='$userid'";
	$result=mysql_query($SQL);
	$row=mysql_fetch_array($result);
	
	
			$photo=htmlspecialchars($row['photo']);
				if($photo!="")
				{
					?>
						<img src="uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps" width="200px" height="200px">
						</br>
					<?php
					
				}
				
			$nom=htmlspecialchars($row['nom']);
				echo $nom;
			$prenom=htmlspecialchars($row['prenom']);
				echo $prenom;
			?> </br> <?php
			$descriptif=htmlspecialchars($row['descriptif']);
				if($descriptif!="")
					{
						echo $descriptif;
					}
			?> </br> <?php
			$photo1=htmlspecialchars($row['photo1']);
				if($photo1!="")
				{
					?>
					<img src="uploaded/<?php echo $photo1 ;?>" alt="photo-demain-le-primtemps" width="200px" height="200px">
					<?php
				}
			?> </br> <?php
			$photo2=htmlspecialchars($row['photo2']);
				if($photo2!="")
				{
					?>
					<img src="uploaded/<?php echo $photo2 ;?>" alt="photo-demain-le-primtemps" width="200px" height="200px">
					<?php
				}
			?> </br> <?php
		$video1=htmlspecialchars($row['video1']);
			if($video1!="")
			{	
				echo html_entity_decode($video1);
			}
			?> </br> <?php
		$video2=htmlspecialchars($row['video2']);
			if($video2!="")
				{
					echo html_entity_decode($video2);
				}
				?> </br> <?php
		$commentaire=htmlspecialchars($row['commentaire']);
			if($commentaire!="")
				{
					echo $commentaire;
				}
		
			?> </br> <?php
	?>
	
	<a href="form-profil-membre.php">Modifier mon profil</a>
	

