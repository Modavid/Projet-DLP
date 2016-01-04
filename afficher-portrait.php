<!DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-affiche-fiche.css" rel="stylesheet" media="all" type="text/css">
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
	include('auth.php');
	include('db_config.php');

	mysql_set_charset('UTF8'); 
	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	if(isset($_GET['poid']))
	{
		$poid=$_GET['poid'];
		
		$SQL="SELECT * FROM portrait WHERE poid='$poid'";
		$result=mysql_query($SQL);
		if(!$result||mysql_num_rows($result)==0)
		{
			?>
				<script>
					alert('PROBLEME BASE DE DONNEES.');
				</script>
			<?php
		}
		else
		{
			$row=mysql_fetch_array($result);
			$titre=htmlspecialchars($row['titre']);
			$nom=htmlspecialchars($row['nom']);
			$prenom=htmlspecialchars($row['prenom']);
			$photo=htmlspecialchars($row['photo']);
			$article=htmlspecialchars($row['article'], ENT_QUOTES);
			$eid=htmlspecialchars($row['eid']);
			
			?>
			<table>
				<?php
					if(!$photo||!file_exists("uploaded/" . $photo))
						$photo = "Pas-de-photo.jpg";
				?>
				<tr>
					<td style="padding-left: 50px;padding-top: 50px">
						<img type="photo" src="uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps">
					</td>
					<!-- nom  prenom-->
					<td style="padding-left: 50px;padding-top: 50px">
						<h1>
						<?php
							echo ucwords(strtolower(html_entity_decode($nom))).' '.html_entity_decode($prenom);
						?>
						</h1>
						<?php
							if($titre!='')
							{
								?><h2><?php
								echo nl2br(html_entity_decode($titre));
								?></h2><br><?php
							}
							if($article!='')
							{
								?><p><?php
								echo preg_replace("@(http://[^ ]+/)@", "<a href=\"$1\" onclick=\"window.open(this.href);return false\"><b> Voir polamir sur le blog de l'ecole </b></a>", nl2br($article));
								?><br></p><?php
							}
							$SQL="SELECT * FROM etudiants WHERE eid='$eid'";
							$result=mysql_query($SQL);
							$row=mysql_num_rows($result);
							if($row!=0)
							{
								?>
									<a href="afficher-profil-eleve?eid=<?php echo $eid;?>">
										<b>Acceder au profil etudiant</b>
									</a>
									<br>
								<?php
							}
						?>
						<p>
						<?php
							if ($_SESSION['AUTH']==1||$_SESSION['AUTH']==2)//ADMIN OU MEMBRE
							{
								if ($_SESSION['AUTH']==1)//ADMIN
								{
									?>
									<a href="suppression-portrait?eid=<?php echo $poid;?>">
										<b>Supprimer portrait de la BDD</b>
									</a>
									<br>
									<?php
								}
							}
						?>
						</p>
					</td>
				</tr>
			</table>
			<?php
		}
	}
mysql_close($conn);
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
