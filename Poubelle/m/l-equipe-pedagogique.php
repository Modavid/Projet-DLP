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
			<h1 style="margin-top: 0px; padding-top: 20px;">L'équipe pédagogique</h1>
			
			<?php
				include("db_config.php");
				
				mysql_set_charset('UTF8');
				$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
				$db = mysql_select_db($DB_select, $conn);
				if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
				mysql_set_charset ('UTF8');
				$SQL="SELECT * FROM collectif WHERE type='prof' or type='admin'"; //WHERE type='actuel'
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
					?>
					<div id="conteneur-eleves">
					<div class="table-center">

					<?php
					while($row=mysql_fetch_array($result))
					{
						$nom=htmlspecialchars($row["nom"]);
						$prenom=htmlspecialchars($row["prenom"]);
						$photo=htmlspecialchars($row["photo"]);
						$details=htmlspecialchars($row["details"], ENT_QUOTES);
						$type=htmlspecialchars($row["type"], ENT_QUOTES);
						$cid=htmlspecialchars($row["cid"]);
						
						$SQL1="SELECT * FROM membre WHERE nom='$nom' && prenom='$prenom'"; //WHERE type='actuel'
						$result1=mysql_query($SQL1);
						$row1=mysql_fetch_array($result1);
						if($row1)
							$titre=htmlspecialchars($row1["titre"]);
						else
							$titre="";
						?>
							<div type="pedago">
								<div class="mini-fiche-equipe"><!--BLOC qui contiennent photo, nom, prenom + -->
									<div class="conteneur-image"> <!-- image -->
										<a href="afficher-profil-pedago?cid=<?php echo $cid?>"><img type="pedago" src="/uploaded/<?php echo $photo ;?>" alt="photo-demain-le-printemps"></a>
									</div>
									<div class="nom-prenom"> <!-- nom et prenom-->
										<a href="afficher-profil-pedago?cid=<?php echo $cid?>">
										<h3>
											<?php
												echo $prenom, " ", ucwords(strtolower($nom));
												?></h3><?php
												echo ucwords($type);
												if($titre != "")
													echo " : ", strtolower($titre);
											?>
										</h3>
										</a>
									</div>
								</div>
							</div>
								
								<!--<td>
									<p>
									<div class="description">
										<p>
											<?php
												echo html_entity_decode($details);
											?>
										</p>
									</div>
									</p>
								</td>-->
						<?php
					}
					?></div></div><?php
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
