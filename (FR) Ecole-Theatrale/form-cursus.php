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
						Ajouter nouveau cursus
					</h1>
					<h2>
						<a href="afficher-profil-eleve.php?eid=<?php echo $userid;?>">Voir profil</a>
					</h2>
				</td>
			</tr>
		</table>
		<h2 style="padding-left: 30px">Ajouter cursus <br><br></h2>
		<form method="POST" action="ajouter-cursus.php" enctype="multipart/form-data" class="formulaire">  
			
			<input type="hidden" name="eid" value="<?php echo $userid;?>"> 
			
			<section>
				<span class="titre-ligne">Type</span>
				<SELECT name="cursus" size="1">
									<OPTION>Stage
									<OPTION>Masterclass
				</SELECT>
			</section><br/>
			
			<section>
				<span class="titre-ligne">Ville</span>
									<SELECT name="lieu" size="1">
										<OPTION>Minsk
										<OPTION>Chine
									</SELECT>
			</section><br>
			
					<section>
				<span class="titre-ligne">Mois</span>
				<SELECT name="mois" size="1">
									<OPTION>janvier
									<OPTION>février
									<OPTION>mars
									<OPTION>avril
									<OPTION>mai
									<OPTION>juin
									<OPTION>juillet	
									<OPTION>août
									<OPTION>septembre
									<OPTION>octobre
									<OPTION>novembre
									<OPTION>décembre
								</SELECT>
			</section><br>
			
			<section>
				<span class="titre-ligne">Année</span>
				<SELECT name="date" size="1">
									<OPTION>1995
									<OPTION>1996
									<OPTION>1997
									<OPTION>1998
									<OPTION>1999
									<OPTION>2000	
									<OPTION>2001
									<OPTION>2002
									<OPTION>2003
									<OPTION>2004
									<OPTION>2005
									<OPTION>2006
									<OPTION>2007
									<OPTION>2008
									<OPTION>2009
									<OPTION>2010
									<OPTION>2011
									<OPTION>2012
									<OPTION>2013
									<OPTION>2014
									<OPTION>2015
									<OPTION>2016
									<OPTION>2017
									<OPTION>2018
									<OPTION>2019
									<OPTION>2020
								</SELECT>
			</section><br>
		
	
		<input type="submit" value="Envoyer">
		</form>
		
		<?php			
		}
		else
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