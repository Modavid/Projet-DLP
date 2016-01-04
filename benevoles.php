<!DOCTYPE html >

<head>
	
	<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
	<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
	<link href="style/style-affiche-fiche.css" rel="stylesheet" media="all" type="text/css">
	<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
	<title>Participants à l'association</title>
	
</head>

<body>

<?php
	include(dirname(__FILE__)."/auth.php");
	include(dirname(__FILE__)."/header.php");
	
	include("db_config.php");
	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) {
		die('Erreur de connexion: ' . mysql_error()); 
	}
	$comparedate=0;
?>

<section class="conteneur-superieur">
	<div class="conteneur">
	<h1>Participants à l'association</h1>
		
		
	<table id="tab-search">
		<tbody>
			<form method="post" action=""> -->
				<tr>
					<td id="titre2">Nom</td>
					<td><input type="text" name="nom"></td>
					<td rowspan="2" align="center"><input type="submit" value="Rechercher"></td>
				</tr>
				<tr>
					<td id="titre2">Prenom</td>
					<td><input type="text" name="prenom"></td>
				</tr>
			</form>	
			<?php if($_SESSION['AUTH']==1){ ?>
			<form method="post" action="form-ajouter-benevole.php">
				<tr>
					<td> </td>
					<td><input type="submit" value="Ajouter un benevole"></td>
				</tr>
			</form>
			<?php } ?>
		</tbody>	   
	</table>

		
	<div id="conteneur-eleves">

<?php

	$SQL1="SELECT * FROM cursus WHERE type='Stage' ORDER BY annee DESC";
	$result1=mysql_query($SQL1);
	$tab=mysql_fetch_array($result1);
	$eid=htmlspecialchars($tab['eid']);
		
		$SQL="SELECT * FROM etudiants WHERE eid='$eid'";
		$result=mysql_query($SQL);
		
		if(!$result1||mysql_num_rows($result1)==0)
		{
			?>
			
			<script>
			alert('PROBLEME BASE DE DONNEES.');
			</script>
			
			<?php
		}
		else
		{
			
			$i = 0;
			?><table align="center"><?php
			while($tab=mysql_fetch_array($result1))
			{
				$eid=htmlspecialchars($tab['eid']);
				$SQL="SELECT * FROM etudiants WHERE eid='$eid'";
				$result=mysql_query($SQL);
				$date = htmlspecialchars($tab['annee']); 
				if(strcmp($date,$comparedate)!=0) 
				{
					?>
					<tr>
						<td width="138px">
						<h2>
							Août <?php echo $date;?>
						</h2>
						</td>
					</tr>
					<?php
					$i = 0;
					$comparedate=$date;
				}
					while($row = mysql_fetch_array($result))
					{
						if ($i == 0)
						{
							?><tr type="eleve"><?php
						}
						$photo = htmlspecialchars($row['photo']); 
						$nom = htmlspecialchars($row['nom']); 
						$prenom = htmlspecialchars($row['prenom']); 
						//$eid= htmlspecialchars($row['eid']);
				
						?> 
							<!-- photo -->
							<td type="eleve">
								<?php
									if(!$photo||!file_exists("uploaded/" . $photo))
										$photo = "Pas-de-photo.jpg";
								?>
								<a href="afficher-profil-eleve.php?eid=<?php echo $eid;?>">
									<img type="eleve" src="/uploaded/<?php echo $photo;?>" alt="photo-demain-le-primtemps">
								</a>
								<br>
					
					
							<!-- nom et prenom -->
								<a href="afficher-profil-eleve.php?eid=<?php echo $eid;?>">
									<?php echo ucwords(strtolower(html_entity_decode($nom)))?><br><? echo html_entity_decode($prenom);?>
								</a>
							</td>
					
						<?php
						$i = $i + 1;
						if ($i == 4)// $i == nombre de photos par ligne
						{
							?></tr><tr><td><br></td></tr><?php
							$i = 0;
						}	
					}
			}
			?></table><?php
		}
	mysql_close($conn);

	?>
	</div>
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
