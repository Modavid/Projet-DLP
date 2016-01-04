<!DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
		
		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
		<link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />
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

			if(isset($_POST['aid']) && isset($_POST['titre']) && isset($_POST['descriptif']) && isset($_POST['texte']) && isset($_POST['lien']))
			{
				$titre=mysql_real_escape_string($_POST['titre']);
				$descriptif=mysql_real_escape_string($_POST['descriptif']);
				$texte=mysql_real_escape_string($_POST['texte']);
				$lien=mysql_real_escape_string($_POST['lien']);
				$aid=mysql_real_escape_string($_POST['aid']);
				
				$SQL="SELECT * FROM actualite WHERE aid='$aid'";
				$result = mysql_query($SQL);
				$row=mysql_num_rows($result);
				if($row == 0)
				{
					?>
						<script>
							alert('La fiche n\'existe pas.');
						</script>
						<h2 style="padding-left: 30px">
							<a href="index.php">Index</a>
						</h2>
					<?php
				}
				else
				{
					$name = mysql_real_escape_string($_FILES["myfile"]["name"]);
					$temp = $_FILES["myfile"]["tmp_name"];
					$error = $_FILES["myfile"]["error"];
					echo $error;
					
					if($error<=0)
					{
						$SQL="UPDATE actualite SET photo='$name' WHERE aid='$aid'";
						echo $SQL;
						$result = mysql_query($SQL);
						move_uploaded_file($temp,"uploaded/".$name);
					}
					$SQL="UPDATE actualite SET titre='$titre', descriptif='$descriptif', texte='$texte', lien='$lien' WHERE aid='$aid'";
					$result=mysql_query($SQL);
					if($result)
					{
						?> 
							<h2 style="padding-left: 30px">
								Votre fiche a ete modifiee
								<br><br>
								<a href="page-actualite.php">Voir toute l'actualite</a>
							</h2>
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
	?>
			<center>
				<h2 style="padding-left: 30px">
				<a href="index.php">Retour a l'accueil</a>
				</h2>
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