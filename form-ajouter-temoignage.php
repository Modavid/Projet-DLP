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
					<h1> Vos impressions du stage</h1><br>
			
			<form method="post" action="ajouter-temoignages.php" id="temoignage" class="formulaire">
				<input type="hidden" name="eid" value="<?php echo $userid;?>">
			
				<section>
					<span class="titre-ligne">Avis sur la formation DLP</span>
					<textarea input type="text" name="titre"required rows="1" cols="35"></textarea>
				</section><br>
				
				<section>
					<span class="titre-ligne">Texte</span>
					<textarea type="text" name="commentaire"required rows="15" cols="35"></textarea>
				</section><br>
				
				<input type="submit" value="Envoyer">
			</form>
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