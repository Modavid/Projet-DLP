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
		<link rel="icon" type="image/png" href="/Image/images-design/mafavicon-1.ico" />
	</head>
	
<body>
	<?php
	include("auth.php");
	include("db_config.php");
	include(dirname(__FILE__)."/header.php");
	mysql_set_charset('UTF8');
	?>
	
	<div class="conteneur">
	
	<?php
		if (isset($_GET['aid']))
		{
			$aid=$_GET['aid'];
			$SQL="SELECT * FROM actualite WHERE aid='$aid'";
			$result=mysql_query($SQL);
			$row=mysql_num_rows($result);
			$tab=mysql_fetch_array($result);
			$titre=htmlspecialchars($tab['titre']);
			$descriptif=htmlspecialchars($tab['descriptif']);
			$texte=htmlspecialchars($tab['texte']);
			$lien=htmlspecialchars($tab['lien']);
			
			if ($_SESSION["AUTH"] == 1)
			{
				?>		
				<h1>Modifier une actualité</h1>
				<br>
				<form method="post" action="modifier-actu.php" id="actu" class="formulaire" enctype="multipart/form-data">
					<input type="hidden" name="aid" value="<?php echo $aid;?>">

					<section>
						<span class="titre-ligne">Titre</span>
						<textarea type="text" name="titre" cols="25" rows="2" maxlength="60" required><?php
							echo $titre;
						?></textarea>
					</section><br>
		   
					<section>
						<span class="titre-ligne">Descriptif</span>
						<textarea type="text" name="descriptif" cols="30" rows="10" maxlenght="460" required><?php
							echo $descriptif;
						?></textarea>
					</section><br>
		   
					<section>
						<span class="titre-ligne">Texte</span>
						<textarea type="text" name="texte" cols="40" rows="15" required><?php
							echo $texte;
						?></textarea>
					</section><br>
			
					<section>
						<span class="titre-ligne">Photo</span>
						<input type="file" name="myfile">
					</section><br>
		
					<section>
						<span class="titre-ligne">Lien</span>
						<textarea type="text" name="lien" cols="30" rows="2" maxlength="250" required><?php
							echo $lien;
						?></textarea>
					</section><br><br>

					<input type="submit" value="Envoyer">
				</form>
				
				<?php
			}
			else
			{
				?><h2 style="padding-left: 50px;padding-top: 50px"><?php
					echo "Vous tentez d'acceder a une page qui vous est refusee.";
				?></h2><?php
				
			}
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