<?php
	include("auth.php");
	include("db_config.php");
?>
<! DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-form.css" rel="stylesheet" media="all" type="text/css">
		<title>Gestion des partenaires</title>	
	</head>
	
<body>
	<?php
	include(dirname(__FILE__)."/header.php");
	?>
	
<div class="conteneur">
	<?php
			$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
			$db = mysql_select_db($DB_select, $conn);
			if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
			
	if($_SESSION['AUTH']==2||$_SESSION['AUTH']==1)
		{	
			if($dadde==1||$_SESSION['AUTH']==1)
				{
					?>
					<div class="block-formulaire">
					
					<h1>Ajouter un partenaire</h1>
						
						<form method="post" action="ajouter-partenaire.php" enctype="multipart/form-data" class="formulaire">
							<section>
								<span class="titre-ligne">Nom</span>
								<input type="text" name="nom"required>
							</section><br>
							
							<section>
								<span class="titre-ligne">Lien</span>
								<input type="text" name="url"required>
							</section><br>

							<section>
								<span class="titre-ligne">Type</span>
								<input type="radio" name="type" value="officiel"checked required> Officiel
								<input type="radio" name="type" value="culturel" required> Culturel
							</section><br>

							<section>
								<span class="titre-ligne">Photo</span>
								<input type="file" name="myfile" required>
							</section>
						
						<br/><br/>
						<input type="submit" value="Ajouter">
					</form>
				</div>
				<?php
				
				$SQL 	= "SELECT nom FROM partenaire";
				$result = mysql_query($SQL);
				$count	= mysql_num_rows($result);
				
					if(!$result|| $count==0)
					{
						?>
							<p>
								Aucun partenaire - Culturel
								<a href="index.php">Retour à l'accueil</a>
							</p>
						<?php
					}
					else 
					{
						?>
						<div class="block-formulaire">
							
							<h1>Supprimer un partenaire</h1>
							
							<form method="post" action="suppression-partenaire.php" enctype="multipart/form-data" class="formulaire">
								
								<?php
								while($row=mysql_fetch_array($result))
								{
									$nom= htmlspecialchars($row['nom']);
								?>
									<section>
										<span class="titre-ligne">Nom</span>
										<input type="radio" name="nom" value="<?php echo($nom); ?>"> <?php echo($nom); ?>
									</section><br>
								<?php
								}
								?>
								<br/><br/>
								<input type="submit" value="Supprimer">
							</form>
						</div>
					<?php
					}
				}
				else
				{
					echo "Droit insuffisant. Vous n'êtes pas autorisé a acceder a cette page.";
				}
		}
		else
		{
			echo "ACCES REFUSE";
		}
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
