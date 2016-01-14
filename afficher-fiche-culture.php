<!DOCTYPE html >
<html>
	<head>
		<title>Fiche Culture</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-affiche-fiche-culture.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-affiche-fiche.css" rel="stylesheet" media="all" type="text/css">
		<link rel="icon" type="image/png" href="/Image/images-design/mafavicon-1.ico" />
		<link rel="image_src" href="<?php echo $photo; ?>">
	</head>
	
<body>
	<!--Bouton Facebook-->
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
  		var js, fjs = d.getElementsByTagName(s)[0];
  		if (d.getElementById(id)) return;
  		js = d.createElement(s); js.id = id;
  		js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
  		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<?php
		include(dirname(__FILE__)."/header.php");
	?>
	
	<section class="conteneur-superieur">
		<div class="conteneur">
			<?php
			include("db_config.php");
			mysql_set_charset('UTF8');
				$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
				$db = mysql_select_db($DB_select, $conn);
				if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
				
				if(isset($_GET['cuid']))
				{
					$cuid = $_GET['cuid'];
					
					$SQL="SELECT * FROM cultiver WHERE cuid='$cuid'";
					$result=mysql_query($SQL);
					if(!$result||mysql_num_rows($result)==0)
					{
						?>
							<script>
								alert('PROBLEME BASE DE DONNEES..');
							</script>
						<?php
					}
					else
					{
						$row=mysql_fetch_array($result);
						$titre=htmlspecialchars($row['titre']);
						$photo=htmlspecialchars($row['photo']);
						$texte=htmlspecialchars($row['texte']);
						
						?>
						
						<table>
							<tr>
								<td style="padding-left: 50px;padding-top: 50px">
									<img type="photo" src="uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps">
								</td>
								<td style="padding-left: 50px;padding-top: 50px">
									<h1>
										<?php echo $titre;?>
									</h1>
								</td>
							</tr>
						</table>
					
						<div class="text-bloc1">
							<p>
								<br>
								<?php echo nl2br($texte);?>			
							</p>
						</div>
						<br>
						<?php
							if ($_SESSION['AUTH']==1)//ADMIN
							{
								?>
									<div class="bloc-admin">
										<h2 style="padding-left: 10px">
											Gestion fiche
										</h2>
										<a href="suppression-fiche-culture?cuid=<?php echo $cuid;?>" onclick="return confirm('Voulez-vous vraiment suprimer cette fiche ?');">
											<b type="profil">Supprimer fiche culture de la BDD</b>
										</a><br><br>
										<a href="form-modifier-fiche-culture?cuid=<?php echo $cuid;?>">
											<b type="profil">Modifier fiche culture</b>
										</a>
										<br><br>
									</div>
								<?php
							}
						?>
						</p>
						<?php	
					}
				}
				
			mysql_close($conn);
			?>
			<div class="fb-like" data-href="http://www.ecole-theatrale.fr/afficher-fiche-culture.php?cuid=<?php echo $cuid;?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
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