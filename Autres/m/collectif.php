<!DOCTYPE html >
		<?php
		include(dirname(__FILE__)."/header.php");
	?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<meta name="viewport" content="width=device-width"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-affiche-fiche.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-pedago.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
	</head>
	
<body>

	
	<section class="conteneur-superieur">
		<div class="conteneur">
			<h1>Collectif</h1>
			<div id="conteneur-eleves">
			
			<?php
				include("db_config.php");
				
				mysql_set_charset('UTF8');
				$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
				$db = mysql_select_db($DB_select, $conn);
				if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
				mysql_set_charset ('UTF8');
				$SQL="SELECT * FROM collectif"; //WHERE type='actuel'
				$result=mysql_query($SQL);
				
				if(!$result || mysql_num_rows($result)==0)
				{
					?>
					
						<script>
							alert("Page en construction");
						</script>
						
					<?php
				}
				else
				{
					?><div class="table-center"><?php
					while($row=mysql_fetch_array($result))
					{
						$nom=htmlspecialchars($row["nom"]);
						$prenom=htmlspecialchars($row["prenom"]);
						$photo=htmlspecialchars($row["photo"]);
						$details=htmlspecialchars($row["details"], ENT_QUOTES);
						$fonction=htmlspecialchars($row["fonction"], ENT_QUOTES);
						
						?>
						<div type="pedago">
							<div class="mini-fiche-equipe"><!--BLOC qui contiennent photo, nom, prenom + -->
								<div class="conteneur-image"> <!-- image -->
									<img type="pedago" src="/uploaded/<?php echo $photo ;?>" alt="photo-demain-le-printemps">
								</div>
								<div class="nom-prenom"> <!-- nom et prenom-->
									<h3>
									<?php
										echo $prenom, " ", $nom;
									?>
									</h3>
								</div>
							</div>
						</div>
							
						<?php
					}
				}
			?>
			
		
		<!--Fin div conteneur-->
		</div>
	<!--Fin section conteneur-superieur-->
	</section>

	<?php
		include(dirname(__FILE__)."/footer.php");
	?>
</body>
</html>
