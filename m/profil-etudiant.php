<!DOCTYPE html >
		<?php
		include(dirname(__FILE__)."/header.php");
	?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
		
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

<section class="conteneur-superieur">	
	<div class="conteneur">
<?php

		include("auth.php");
		include("db_config.php");

		
		$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
		$db = mysql_select_db($DB_select, $conn);
		if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
		
		?>
			<h1>
				Mise à jour du profil :
			</h1><h2 style="padding-left: 30px">
		<?php
		
		if(empty($_POST['eid']))
		{
			$eid = mysql_real_escape_string($_POST['eid']);
			if(isset($_FILES["myfile"]))
			{
			
				$name = $_FILES["myfile"]["name"];
				$type = $_FILES["myfile"]["type"];
				$size = $_FILES["myfile"]["size"];
				$temp = $_FILES["myfile"]["tmp_name"];
				$error = $_FILES["myfile"]["error"];
			
				if($error>0)
				{
			
				}
				else
				{
					move_uploaded_file($temp,"uploaded/".$name);
					$SQL="UPDATE profil SET photo='$name'WHERE eid='$eid'";
					$result = mysql_query($SQL);
					$SQL10="UPDATE etudiants SET photo='$name' WHERE eid='$eid'";
					$result10 = mysql_query($SQL10);
					echo "--> Votre photo de profil est à jour.";
				}
				
			}
			
			if(isset($_FILES["myfile1"]))
			{
				$name1 = $_FILES["myfile1"]["name"];
				$type1 = $_FILES["myfile1"]["type"];
				$size1 = $_FILES["myfile1"]["size"];
				$temp1 = $_FILES["myfile1"]["tmp_name"];
				$error1 = $_FILES["myfile1"]["error"];
				
				if($error1>0)
				{
				
				}
				else
				{
					move_uploaded_file($temp1,"uploaded/".$name1);
					$SQL1="UPDATE profil SET photo1='$name1' WHERE eid='$eid'";
					$result1 = mysql_query($SQL1);
					echo "--> Votre image 1 est à jour";
				}
				
				
			}
			
			if(isset($_FILES["myfile2"]))
			{
				$name2 = $_FILES["myfile2"]["name"];
				$type2 = $_FILES["myfile2"]["type"];
				$size2 = $_FILES["myfile2"]["size"];
				$temp2 = $_FILES["myfile2"]["tmp_name"];
				$error2 = $_FILES["myfile2"]["error"];
				
				if($error2>0)
				{
					
				}
				else
				{
					move_uploaded_file($temp2,"uploaded/".$name2);
					$SQL2="UPDATE profil SET photo2='$name2' WHERE eid='$eid'";
					$result2 = mysql_query($SQL2);
					echo "--> Votre image 2 est à jour";
				}
			}
			
			if(isset($_POST['descriptif']))
			{
				$descriptif = mysql_real_escape_string($_POST['descriptif']);
				
				if($descriptif!="")
				{
					$SQL3="UPDATE profil SET descriptif='$descriptif' WHERE eid='$eid'";
					$result3 = mysql_query($SQL3);
					echo "--> Votre description des photos est à jour";
				}
			}
			
			if($_POST['commentaire'])
			{
				$commentaire = mysql_real_escape_string($_POST['commentaire']);
				
				if($commentaire!="")
				{
					$SQL4="UPDATE profil SET commentaire='$commentaire' WHERE eid='$eid'";
					$result4 = mysql_query($SQL4);
					echo "--> Votre description des vidéos est à jour";
				}
			}
			
			if(isset($_POST['video1']))
			{
				$video1 = mysql_real_escape_string($_POST['video1']);
				if($video1!="")
				{
					$SQL5="UPDATE profil SET video1='$video1' WHERE eid='$eid'";
					$result5 = mysql_query($SQL5);
					echo "--> Votre vidéo 1 est à jour";
				}
			}
			
			if(isset($_POST['video2']))
			{
				$video2 = mysql_real_escape_string($_POST['video2']);	
				
				if($video2!="")
				{
					$SQL6="UPDATE profil SET video2='$video2' WHERE eid='$eid'";
					$result6 = mysql_query($SQL6);
					echo "--> Votre vidéo 2 est à jour";
				}
				
			}
			
			if(isset($_POST['site']))
			{
				$site = mysql_real_escape_string($_POST['site']);	
				
				if($site!="")
				{
					$SQL="UPDATE profil SET site='$site' WHERE eid='$eid'";
					$result = mysql_query($SQL);
					echo "--> Votre site est à jour";
				}
				
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
			<?php
		}//fin if(eid)
		
		?>
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
