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
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
	</head>
	
<body>
<?php
	
	include("db_config.php");
	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	$comparedate=0;
	?>
	<section class="conteneur-superieur">
		<div class="conteneur">
			<h1>
				Resultats de la recherche :
			</h1>

<?php
include('db_config.php');

	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	
	if(isset($_POST['nom']) || isset($_POST['prenom']))
	{
		$nom=htmlentities(mysql_real_escape_string($_POST['nom']));
		$prenom=htmlentities(mysql_real_escape_string($_POST['prenom']));
		
		$SQL="SELECT * FROM etudiants WHERE nom='$nom' && prenom='$prenom' ";
		$result=mysql_query($SQL);
		if(!$result||mysql_num_rows($result)==0)
		{
			$SQL="SELECT * FROM etudiants WHERE nom='$nom' || prenom='$prenom'  && nom!='' && prenom !=''";
			$result=mysql_query($SQL);
		}
		if(!$result||mysql_num_rows($result)==0)
		{
			?>
				<p>
					<br>
					Aucun étudiant trouvé.
					<a href="nos-eleves-stagiaire.php"><u>Voir nos élèves stagiaire</u></a>
					ou <a href="nos-eleves-masterien.php"><u>voir nos élèves masterien</u></a>.
				</p>
			<?php
		}
		else if(mysql_num_rows($result)==1) // un seul eleve trouvé
		{
			?><div class="table-center"><?php
			$row=mysql_fetch_array($result);
			$photo=htmlspecialchars($row['photo']);
			$nom=htmlspecialchars($row['nom']);
			$prenom=htmlspecialchars($row['prenom']);
			$eid=htmlspecialchars($row['eid']);
			
			?> 
				<!-- photo -->
				<div type="eleve">
					<?php
						if(!$photo||!file_exists("../uploaded/".$photo))
							$photo = "Pas-de-photo.jpg";
					?>
					<a href="afficher-profil-eleve.php?eid=<?php echo $eid;?>">
						<img type="eleve" src="/uploaded/<?php echo $photo;?>" alt="photo-demain-le-primtemps">
					</a>
				<br>
				
				<!-- nom et prenom -->
					<a href="afficher-profil-eleve.php?eid=<?php echo $eid;?>"><?php echo ucwords(strtolower(html_entity_decode($nom)))?><br><?php echo html_entity_decode($prenom);?></a>
				</div>
				
				<?php
			?></div><?php
		}
		else // eleves multiples
		{
			?><div class="table-center"><?php
			while($row = mysql_fetch_array($result))
			{
				$photo = htmlspecialchars($row['photo']); 
				$nom = htmlspecialchars($row['nom']); 
				$prenom = htmlspecialchars($row['prenom']); 
				$eid= htmlspecialchars($row['eid']);
				
				?> 
					<!-- photo -->
					<div type="eleve">
						<?php
							if(!$photo||!file_exists("../uploaded/".$photo))
								$photo = "Pas-de-photo.jpg";
						?>
						<a href="afficher-profil-eleve.php?eid=<?php echo $eid;?>">
							<img type="eleve" src="/uploaded/<?php echo $photo;?>" alt="photo-demain-le-primtemps">
						</a> 
					<br>
					
					<!-- nom et prenom -->
						<a href="afficher-profil-eleve.php?eid=<?php echo $eid;?>"><?php echo ucwords(strtolower(html_entity_decode($nom)))?><br><?php echo html_entity_decode($prenom);?></a>
					</div>
					
				<?php		
			}
			?></div><?php
		}
		
	}


?>

<!--Fin div conteneur-->
<br>
		</div> 
	<!--Fin section conteneur-superieur-->
	</section>

	<?php
		include(dirname(__FILE__)."/footer.php");
	?>
</body>
</html>