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
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-form.css" rel="stylesheet" media="all" type="text/css">
		<link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />
	</head>
	
<body>
	<?php
	include(dirname(__FILE__)."/header.php");
	?>
		
	<div class="conteneur">
	
		<?php
		if ($_SESSION["AUTH"]==1 && isset($_GET['eid']))
		{
			$userid=$_GET['eid'];
		}
		else
		{
			$userid=$_SESSION['USERID'];
		}
		

		if($_SESSION["AUTH"]==3||$_SESSION["AUTH"]==1)
		{
			$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
			$db = mysql_select_db($DB_select, $conn);
			if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
			
			
			$SQL="SELECT * FROM profil WHERE eid='$userid' ";
			$result=mysql_query($SQL);
			$row=mysql_fetch_array($result);
			$pid=htmlspecialchars($row['pid']);
			
			if($row['photo'] != '')
			{
				$photo=htmlspecialchars($row['photo']);
			}
			else
			{
				$photo="Pas-de-photo.jpg";
			}
			
			$nom=htmlspecialchars($row['nom']);
			$prenom=htmlspecialchars($row['prenom']);
		?>
		<table>
			<tr>
				<td style="padding-left: 50px;padding-top: 50px">
					<img type="eleve" src="uploaded/<?php echo $_GET['test'] ;?>" alt="photo-demain-le-primtemps">
				</td>
				<td style="padding-left: 50px;padding-top: 50px" width="300px">
					<h1>
						Modification cursus
					</h1>
					<h2>
						<a href="afficher-profil-eleve.php?eid=<?php echo $userid;?>">Voir profil</a>
					</h2>
				</td>
			</tr>
		</table>
		<h2 style="padding-left: 30px">Modifier cursus <br><br></h2>
		<form method="POST" action="modifier-cursus.php" enctype="multipart/form-data" class="formulaire">  
			<?php
			$SQL1="SELECT * FROM cursus WHERE eid='$userid' ";
			$result1=mysql_query($SQL1);
			$row1=mysql_fetch_array($result1);
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
				
					$SQL1="SELECT * FROM cursus WHERE eid='$userid' ORDER BY annee";
					$result1=mysql_query($SQL1);
					$j=mysql_num_rows($result1);
					$i=0;
					while($row1=mysql_fetch_array($result1))
					{
					if($i<$j)
					{
					$eid=htmlspecialchars($row1['eid']);
					$type=htmlspecialchars($row1['type']);
					$lieu=htmlspecialchars($row1['lieu']);
					$mois=htmlspecialchars($row1['mois']);
					$annee=htmlspecialchars($row1['annee']);
					$cuid=htmlspecialchars($row1['cuid']);
					
			?>
			<input type="hidden" name="eid" value="<?php echo $userid;?>"> 
			<section>
				<span class="titre-ligne">TYPE</span>
				<input type="text" name="type" value="<?php
					echo $type;
				?>">
			</section><br>
			
			<section>
				<span class="titre-ligne">VILLE</span>
				<input type="text" name="lieu" value="<?php
					echo $lieu;
				?>">
			</section><br>
	
			<section>
				<span class="titre-ligne">MOIS</span>
				<input type="text" name="mois" value="<?php
					echo $mois;
				?>">
			</section><br>
			
			<section>
				<span class="titre-ligne">ANNEE</span>
				<input type="text" name="annee" value="<?php
					echo $annee;
				?>">
			</section>
			
			<section class="ligne" >
				<input type="hidden" name="cuid" value="<?php
				echo ($cuid) ?>"  >
			</section>
			<section class="ligne" >
				<input type="hidden" name="eid" value="<?php
				echo ($eid) ?>"  >
			</section>
			<input type="submit" value="Envoyer">
			<br>
			<br>
			<?php
		$i++;
					}		
						}
			} ?>
		
		</form>
		
		<?php			
		}else
		{
			?><h2>
				Vous tentez d'acceder a une page qui vous est refusee.<br>
				<a href="index.php">Retour a l'accueil</a>
			</h2><?php
		}
		?>
		
	</div> 
	<!--Fin div conteneur-->
				
	<?php
	include(dirname(__FILE__)."/barre-laterale.php");
	?>
		
	</section>
	<!--Fin section conteneur-superieur-->

	<?php
	include(dirname(__FILE__)."/footer.php");
	?>
</body>
</html>