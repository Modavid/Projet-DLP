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
					
						<h1>Ajouter un Bénévole</h1>
						
						<div class="text-bloc1">
							<p>Bienvenue a lui !</br>
						</div>
						
						<form method="post" action="ajouter-benevole.php" enctype="multipart/form-data" class="formulaire">
							<section>
								<span class="titre-ligne">Nom</span>
								<input type="text" name="nom"required>
							</section><br>
							
							<section>
								<span class="titre-ligne">Prenom</span>
								<input type="text" name="prenom"required>
							</section><br>
							
							<section>
								<span class="titre-ligne">Email</span>
								<input type="email" name="email"required>
							</section><br>
							
							<section>
								<span class="titre-ligne">Photo</span>
								<input type="file" name="myfile" required>
							</section>
						
						<br/><br/>
						<input type="submit" value="Envoyer">
					</form>
				</div>

					<?php
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
