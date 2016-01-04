<!DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-form.css" rel="stylesheet" media="all" type="text/css">
		
		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
		<link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />
	</head>
	
<body>

	<section class="conteneur-superieur">	
	<div class="conteneur">
	<?php

		include("auth.php");
		include("db_config.php");
		$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
		if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
		$db = mysql_select_db($DB_select, $conn);
		if(isset($_GET['eid']) && isset($_SESSION['AUTH']) == 1)//ADMIN
		{
			$eid =mysql_real_escape_string($_GET['eid']);
			$photo=mysql_real_escape_string($_POST['photo2']);
			$SQL="UPDATE profil SET photo2='' WHERE eid = '$eid'";
			$result=mysql_query($SQL);
		}
		mysql_close($conn);
	?>	
	
				<br><br>
				<center>
					<img type="big" src="image-site/MAJ-profil.jpg" alt="MAJ-profil" width="100%" height="100%">
				</center>
				<br>
				<center>
					<a href="index.php">Retourner à l'accueil</a> <br>ou<br> <a href="afficher-profil-eleve.php?eid=<?php echo $eid;?>">Voir profil</a>
				</center>
	
	</div> 
	<!-- Fin div conteneur -->	</h2>	
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
						