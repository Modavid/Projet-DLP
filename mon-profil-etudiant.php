<?php
	include("auth.php");
	include("db_config.php");
?>
<!DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		
		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
		<link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />
	</head>
	
<body>
	<?php
	include(dirname(__FILE__)."/header.php");
	?>
<section class="conteneur-superieur">	
	<div class="conteneur">

<h2> Mon profil </h2>
</br>
</br></br>
<?php

	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	mysql_set_charset ('UTF8');
	$userid=$_SESSION["USERID"];
	$SQL="SELECT * FROM profil WHERE eid='$userid'";
	$result=mysql_query($SQL);
	$row=mysql_fetch_array($result);
	
	
			$photo=htmlspecialchars($row['photo']);
				if($photo!="")
				{
					?>
						<img src="/uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps" width="200px" height="200px">
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
					<img src="/uploaded/<?php echo $photo1 ;?>" alt="photo-demain-le-primtemps" width="200px" height="200px">
					<?php
				}
			?> </br> <?php
			$photo2=htmlspecialchars($row['photo2']);
				if($photo2!="")
				{
					?>
					<img src="/uploaded/<?php echo $photo2 ;?>" alt="photo-demain-le-primtemps" width="200px" height="200px">
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
	
	<a href="form-profil-etudiant.php">Modifier mon profil</a>
</div> 
	<!-- Fin div conteneur -->
	<?php
			include(dirname(__FILE__)."/barre-laterale.php");
			?>
	<!--Fin section conteneur-superieur-->
</section>
	<!-- Add jQuery library -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<!-- Add fancyBox -->
	<link rel="stylesheet" href="/source/jquery.fancybox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="/source/jquery.fancybox.pack.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			$(".fancybox").fancybox({
			    	helpers: {
			    	              title : {
			    	                  type : 'float'
			    	              }
			    	          }
			    });
		});
	</script>
	
	<?php
		include(dirname(__FILE__)."/footer.php");
	?>
	</body>
</html>