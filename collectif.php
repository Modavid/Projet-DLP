<!DOCTYPE html >
<html>
	<head>
		<title>Collectif</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-affiche-fiche.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-pedago.css" rel="stylesheet" media="all" type="text/css">
		<link rel="icon" type="image/png" href="/Image/images-design/mafavicon-1.ico" />
	</head>
	
<body>
	<?php
		include(dirname(__FILE__)."/header.php");
	?>
	
	<section class="conteneur-superieur">
		<div class="conteneur">
			<h1>Collectif</h1>
			
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
				{					?>
					
					<table width="710px">

					<?php
						$i = 0;
					while($row=mysql_fetch_array($result))
					{
						$nom=htmlspecialchars($row["nom"]);
						$prenom=htmlspecialchars($row["prenom"]);
						$photo=htmlspecialchars($row["photo"]);
						$details=htmlspecialchars($row["details"], ENT_QUOTES);
						$fonction=htmlspecialchars($row["fonction"], ENT_QUOTES);
						$cid=htmlspecialchars($row["cid"]);
							if($i == 0)
						{
							?><tr><?php
						}
						?>
					
							<td>
								<div class="mini-fiche-equipe"><!--BLOC qui contiennent photo, nom, prenom + -->
									<aside class="conteneur-image"> <!-- image -->
												<a href="afficher-collectif?cid=<?php echo $cid?>"><img type="pedago"  src="uploaded/<?php echo $photo ;?>" alt="photo-demain-le-printemps" width="150px" height="180px"></a>
									</aside>
											<span class="nom-prenom"> <!-- nom et prenom-->
												<a href="afficher-collectif?cid=<?php echo $cid ?>">
	
													<h3>
											<?php
												echo $prenom, " ", ucwords(strtolower($nom));
												?></h3>
											</span>
								</div>
							</td>
							<?php
						$i = $i + 1;
							if ($i == 4)// $i == nombre de photos par ligne
							{
							?></tr><tr><td><br></td></tr><?php
							$i = 0;
							}
					}
					?></table><?php
				}
			?>
			
		
		<!--Fin div conteneur-->
		</div>
		
		<?php
			include(dirname(__FILE__)."/barre-laterale.php");
		?>
	<!--Fin section conteneur-superieur-->
	</section>

	<?php
		include(dirname(__FILE__)."/footer.php");
	?>
</body>
</html>
