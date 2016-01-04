<! DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-formulaire.css" rel="stylesheet" media="all" type="text/css">
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />
	</head>
	
<body>
	<?php
	include(dirname(__FILE__)."/header.php");
	?>
<section class="conteneur">
		<section id="block-inscription">
		<div id="block-connexion">
			<aside id="trait-gauche"><img src="images-design/trait-gauche.png"/></aside>
			<aside id="trait-droit"><img src="images-design/trait-droit.png"/></aside>
			<article id="titre">Créer un compte</article>
		</div>
		
		<div id="boutons-inscription">
			<aside class="bouton"><a href="creer-compte-etudiant.php">Je suis actuellement étudiant</a></aside>
			<aside class="bouton"><a href="creer-compte-ancien-etudiant.php">Je suis un ancien étudiant</a></aside>
			<aside class="bouton"><a href="creer-compte-professeur.php">Je suis un professeur</a></aside>
			<aside class="bouton"><a href="creer-compte-ancien-professeur.php">Je suis un ancien professeur</a></aside>
			<aside class="bouton"><a href="creer-compte-membre.php">Je suis un membre de l'association</a></aside>
		</div>

	</section>
</section>
<!--Fin section conteneur-->
<?php
	include(dirname(__FILE__)."/footer.php");
?>
</body>
</html>