<?php
	include("auth.php");
	include("db_config.php");
?>
<! DOCTYPE html >
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
		<link href="style/style-form.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-form.css" rel="stylesheet" media="all" type="text/css">
	</head>
	
<body>

	
	<div class="conteneur">
	
	<?php
		if (isset($_GET['tid']))
		{
			$tid=$_GET['tid'];
			$SQL="SELECT * FROM temoignages WHERE tid='$tid'";
			$result=mysql_query($SQL);
			$row=mysql_num_rows($result);
			$tab=mysql_fetch_array($result);
			$titre=htmlspecialchars($tab['titre']);
			$texte=htmlspecialchars($tab['com']);
			$eid=htmlspecialchars($tab['eid']);
			
			if ($row == 1 && ($_SESSION['USERID'] == $eid || $_SESSION["AUTH"] == 1))
			{
				?>
				
				<h1>Modifier un temoignage</h1>
				<br>
				<form method="post" action="modifier-temoignages.php" id="temoignage" class="formulaire">
					<input type="hidden" name="tid" value="<?php echo $tid;?>">
				
					<section>
						<span class="titre-ligne">Titre</span>
						<textarea input type="text" name="titre"required rows="1" cols="40"><?php
							echo $titre;
						?></textarea>
					</section><br>
					
					<section>
						<span class="titre-ligne">Texte</span>
						<textarea type="text" name="commentaire"required rows="15" cols="40"><?php
							echo $texte;
						?></textarea>
					</section><br>
					
					<input type="submit" value="Envoyer">
				</form>
				
				<?php
			}
			else
			{
				?><h2 align="center"><?php
					echo "Vous tentez d'acceder a une page qui vous est refusee.";
				?></h2><?php
				
			}
		}
	?>
	<br>
	</div> 
	<!--Fin div conteneur-->
		
	</section>
	<!--Fin section conteneur-superieur-->

	<?php
	include(dirname(__FILE__)."/footer.php");
	?>
</body>
</html>