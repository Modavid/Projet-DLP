<!DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />		
		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
		
	</head>
	
<body>
	<?php
	include(dirname(__FILE__)."/header.php");
	?>
<section class="conteneur-superieur">	
	<div class="conteneur">
		<h2 style="padding-left: 15px;padding-right: 15px">
	<?php
	include("auth.php");
	include("db_config.php");
	
	mysql_set_charset('UTF8');
	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	
	if(!isset($_SESSION['AUTH']) ||  $_SESSION['AUTH']!=1)
	{
		?>
		<script>
			alert('Vous n\'avez pas les autorisations requises');
		</script>
		<?php
	}
	else if(isset($_POST['titre']) && isset($_POST['descriptif']) && isset($_POST['texte']) && isset($_POST['lien']))
	{
			$titre = mysql_real_escape_string($_POST['titre']);
			$descriptif = mysql_real_escape_string($_POST['descriptif']);
			$texte =mysql_real_escape_string($_POST['texte']);
			$lien = $_POST['lien'];
			
			if(isset($_FILES['myfile']))
			{
				$name = mysql_real_escape_string($_FILES["myfile"]["name"]);
				$type = $_FILES["myfile"]["type"];
				$size = $_FILES["myfile"]["size"];
				$temp = $_FILES["myfile"]["tmp_name"];
				$error = $_FILES["myfile"]["error"];
				
				if($error>0)
				{
					echo "ERREUR";
				}
				else
				{
					move_uploaded_file($temp,"uploaded/".$name);
					$SQL="INSERT INTO actualite(titre,descriptif,texte,photo,lien) VALUES ('$titre','$descriptif','$texte','$name','$lien')";
					$result = mysql_query($SQL);
					
					if($result)
					{
						?> 
								Votre fiche a été rajouté
						<?php
					}
					else
					{
						?>
						<script>
							alert('PROBLEME BASE DE DONNEES');
						</script>
						<?php
					}				
				}
			}
	}
	?>
	<a href="index.php">Retour a l'accueil</a>
	<?php
	
mysql_close($conn);
?>
		</h2>
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