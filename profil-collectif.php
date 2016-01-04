<!DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
		
		<link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />
	</head>
	
<body>
	<?php
	include(dirname(__FILE__)."/header.php");
	?>
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
		
		if(!empty($_POST['cid']))
		{
			$cid = mysql_real_escape_string($_POST['cid']);
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
					$SQL="UPDATE collectif SET photo='$name' WHERE cid='$cid'";
                                        $SQL2="UPDATE membre SET photo='$name' WHERE cid='$cid'";
					$result = mysql_query($SQL);
                                        $result2 = mysql_query($SQL2);
				
					echo "--> Votre photo de profil est à jour.";
				}
				
			}
			
			if(isset($_POST['nom']))
			{
				$nom = mysql_real_escape_string($_POST['nom']);	
						
					$SQL="UPDATE collectif SET nom='$nom' WHERE cid='$cid'";
                                        $SQL2="UPDATE membre SET nom='$nom' WHERE cid='$cid'";
					$result = mysql_query($SQL);
                                        $result2 = mysql_query($SQL2);
					echo "--> Votre fonction est à jour";
				
			}
			if(isset($_POST['prenom']))
			{
				$prenom = mysql_real_escape_string($_POST['prenom']);	
						
					$SQL="UPDATE collectif SET prenom='$prenom' WHERE cid='$cid'";
					$SQL2="UPDATE membre SET prenom='$prenom' WHERE cid='$cid'";
					$result = mysql_query($SQL);
                                        $result2 = mysql_query($SQL2);
					echo "--> Votre fonction est à jour";
				
			}
			
			if(isset($_POST['fonction']))
			{
				$fonction = mysql_real_escape_string($_POST['fonction']);	
						
					$SQL="UPDATE collectif SET fonction='$fonction' WHERE cid='$cid'";
					$SQL2="UPDATE membre SET fonction='$fonction' WHERE cid='$cid'";
					$result = mysql_query($SQL);
                                        $result2 = mysql_query($SQL2);
					echo "--> Votre fonction est à jour";
				
			}
			if(isset($_POST['details']))
			{
				$details = mysql_real_escape_string($_POST['details']);	
						
					$SQL="UPDATE collectif SET details='$details' WHERE cid='$cid'";
					$SQL2="UPDATE membre SET details='$details' WHERE cid='$cid'";
					$result = mysql_query($SQL);
                                        $result2 = mysql_query($SQL2);
					echo "--> Votre fonction est à jour";
				
			}
		
		
		
			?>
				<br><br>
				<center>
					<img type="big" src="image-site/MAJ-profil.jpg" alt="MAJ-profil" width="100%" height="100%">
				</center>
				<br>
				<center>
					<a href="index.php">Retourner à l'accueil</a> <br>ou<br> <a href="afficher-collectif.php?cid=<?php echo $cid;?>">Voir profil</a>
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
