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
	</head>
	
<body>
<?php
	include(dirname(__FILE__)."/auth.php");
	include(dirname(__FILE__)."/header.php");
	
	include("db_config.php");
	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	$comparedate=0;
	?>
	<section class="conteneur-superieur">
		<div class="conteneur">
			<h1>
				Résultats de la recherche :
			</h1>
			
<?php
include('auth.php');
include('db_config.php');

	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	
	if(isset($_POST['nom']) || isset($_POST['prenom']))
	{
		$nom=htmlentities(mysql_real_escape_string($_POST['nom']));
		$prenom=htmlentities(mysql_real_escape_string($_POST['prenom']));
		
		$SQL="SELECT * FROM membre WHERE nom='$nom' && prenom='$prenom' ";
		$result=mysql_query($SQL);
		if(!$result||mysql_num_rows($result)==0)
		{
			$SQL="SELECT * FROM membre WHERE nom='$nom' || prenom='$prenom'  && nom!='' && prenom !=''";
			$result=mysql_query($SQL);
		}
		if(!$result||mysql_num_rows($result)==0)
		{
			?>
				<section class="conteneur-superieur">
		          <div class="conteneur">
		     	<h3 style="text-align:center">
					Aucun membre trouvé.
				</h3>
                <div class="text-bloc1" style="text-align:center ;"> 
               <h3>Pour retourner à la page précédente, <a href="form-creer-compte-membre.php" ><U> cliquer ici</U></a></h3>
                    </div> 
      
                 				
		          </div>
		     	</section>
			<?php
		}
		else if(mysql_num_rows($result)==1) // un seul eleve trouvé
		{
			?><tr><?php
			?><table align="center"><?php
			$row=mysql_fetch_array($result);
			$photo=htmlspecialchars($row['photo']);
			$nom=htmlspecialchars($row['nom']);
			$prenom=htmlspecialchars($row['prenom']);
			$cid=htmlspecialchars($row['cid']);
			
			?> 
				<!-- photo -->
				
				<div class="text-bloc1"> 
            <p><b>Si vous vous reconnaissez sur une photo cliquez dessus pour configurer votre profil personnel.
            Si vous n'êtes pas sur ces photos, c'est que votre profil n'a pas été crée par l'administrateur, merci de nous contacter par mail...</b></p>
               </div>
				<td type="eleve">
					<?php
						if(!$photo||!file_exists("uploaded/" . $photo))
							$photo = "Pas-de-photo.jpg";
					?>
					<a href="creer-compte-membre.php?cid=<?php echo $cid;?>">
						<img type="eleve" src="uploaded/<?php echo $photo;?>" alt="photo-demain-le-primtemps">
					</a>
				<br>
				
				<!-- nom et prenom -->
					<a href="creer-compte-membre.php?cid=<?php echo $cid;?>"><?php echo ucwords(strtolower(html_entity_decode($nom)))?><br><?php echo html_entity_decode($prenom);?></a>
				</td>
				
				<?php
			?></tr><?php
			?></table><?php
		}
		else // eleves multiples
		{
			$i = 0;
			?><table align="center"><?php
			
			echo'<div class="text-bloc1"><p><b>Si vous vous reconnaissez sur une photo cliquez dessus pour configurer votre profil personnel.
            Si vous n\'êtes pas sur ces photos, c\'est que votre profil n\'a pas été crée par l\'administrateur, merci de nous contacter par mail...</b></p><div>';
			
			while($row = mysql_fetch_array($result))
			{
				if ($i == 0)
				{
					?><tr type="eleve"><?php
				}
				$photo = htmlspecialchars($row['photo']); 
				$nom = htmlspecialchars($row['nom']); 
				$prenom = htmlspecialchars($row['prenom']); 
				$cid= htmlspecialchars($row['cid']);
				
				?>
					<!-- photo -->
					<td type="eleve">
						<?php
						if(!$photo||!file_exists("uploaded/" . $photo))
							$photo = "Pas-de-photo.jpg";
						?>
						<a href="creer-compte-membre.php?eid=<?php echo $cid;?>">
							<img type="eleve" src="uploaded/<?php echo $photo;?>" alt="photo-demain-le-primtemps">
						</a>
					<br>
					
					<!-- nom et prenom -->
                                        <a href="creer-compte-membre.php?eid=<?php echo $cid;?>"><?php echo ucwords(strtolower(html_entity_decode($nom)))?><br><?php echo html_entity_decode($prenom);?></a>
					</td>
					
					<?php
					$i = $i + 1;
					if ($i == 4) // $i == nombre de photos par ligne
					{
						?></tr><tr><td><br></td></tr><?php
						$i = 0;
					}	
			}
			?></table><?php
		}
		
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