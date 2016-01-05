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
		<script type="text/javascript">
			$(document).ready(function() {
			
// fade-effet pour les images			
//				$('.fancybox').animate({
//					opacity:.5
//				
//				
//				});
//				$('.fancybox').hover(function(){
//					$(this).stop().animate({opacity:1});
//				}, function(){
//					$(this).stop().animate({opacity:.5});
//				
//				});
			});
		</script>
		
	</head>
	
<body>
	<?php
	
		include("db_config.php");

	include(dirname(__FILE__)."/header.php");
	?>
	<section class="conteneur-superieur">	
	<div class="conteneur">
		<?php
		$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
		$db = mysql_select_db($DB_select, $conn);
		if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }


		
		$eid=mysql_real_escape_string($_POST['eid']);
		$type=mysql_real_escape_string($_POST['type']);
		$mois=mysql_real_escape_string($_POST['mois']);
		$annee=mysql_real_escape_string($_POST['annee']);
		$lieu=mysql_real_escape_string($_POST['lieu']);
		?>
			<h1>
				Mise à jour du Cursus :
			</h1><h2 style="padding-left: 30px">
		<?php
		if(isset($_POST['type']))
		{$cuid=mysql_real_escape_string($_POST['cuid']);
			$SQL="UPDATE `cursus` SET `type` = '$type' WHERE `cuid`= '$cuid'";
			$result=mysql_query($SQL);
			echo "--> Type de formation à jour";?><br><?php 
		}
		if(isset($_POST['mois']))	
		{$cuid=mysql_real_escape_string($_POST['cuid']);
			$SQL1="UPDATE `cursus` SET  `mois` = '$mois'  WHERE `cuid`= '$cuid'";
			$result1=mysql_query($SQL1);
			 echo "--> Mois de formation à jour";?><br><?php 
		}
		if(isset($_POST['annee']))	
		{$cuid=mysql_real_escape_string($_POST['cuid']);
			$SQL2="UPDATE `cursus` SET  `annee` = '$annee' WHERE `cuid`= '$cuid'";
			$result2=mysql_query($SQL2);
			 echo "--> Annee de formation à jour";?><br><?php 
		}
		if(isset($_POST['lieu']))	
		{$cuid=mysql_real_escape_string($_POST['cuid']);
			$SQL3="UPDATE `cursus` SET `lieu` = '$lieu' WHERE `cuid`= '$cuid'";
			$result3=mysql_query($SQL3);
			echo "--> Lieu de formation à jour";?><br><?php 
		}
		?>
				<br><br>
				<center>
					<img type="big" src="image-site/MAJ-profil.jpg" alt="MAJ-profil" width="100%" height="100%">
				</center>
				<br>
				<center>
					<a href="index.php">Retourner à l'accueil</a> <br>ou<br> <a href="afficher-profil-eleve.php?eid=<?php echo $eid;?>">Voir profil</a>
				</center>
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
					

