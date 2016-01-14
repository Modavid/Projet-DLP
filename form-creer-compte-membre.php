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
		<h1>Entrez votre nom ou prénom</h1>
				<form method="post" action="trouver-membre.php">
					<table id="tab-search">
					<tbody>
						<tr>
							<td id="titre2">Nom</td>
							<td><input type="text" name="nom"></td>
							<td rowspan="2" align="center"><input type="submit" value="Rechercher"></td>
						</tr>
                                                <tr>
							<td id="titre2">ou</td>
							
						</tr>
						<tr>
							<td id="titre2">Prenom</td>
							<td><input type="text" name="prenom"></td>
						</tr>		   
				</form>
						
					</tbody>
					</table>
						<div class="text-bloc1" style="margin-left:200px"> 
                       <p>Merci de ne pas mettre les accents</p>
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