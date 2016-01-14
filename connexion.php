<! DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-formulaire.css" rel="stylesheet" media="all" type="text/css">
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<link rel="icon" type="image/png" href="/Image/images-design/mafavicon-1.ico" />
	</head>
	
<body>
	<?php
	include(dirname(__FILE__)."/header.php");
	?>
<section class="conteneur">
	<section class="block-formulaire">
		<div id="block-connexion">
			<aside id="trait-gauche"><img src="Image/images-design/trait-gauche.png"/></aside>
			<aside id="trait-droit"><img src="Image/images-design/trait-droit.png"/></aside>
			<article id="titre">Connexion</article>
		</div>
			
			
			<form method="post" action="auth.php" class="formulaire">
			<section class="ligne">
			   <span>Login</span>
			   <input id="champs-login" type="text" name="login" value=""required/>
			</section>
			   
			 <section class="ligne">
			   <span>Mot de passe</span>
			   <input id="champs-mdp" type="password" name="mdp" value="" required/>
			 </section>
			 
			   <input type="submit" value="Se connecter">
			   
			</form>
			
			<div id="block-ou">
			
				<aside id="trait-gauche2"><img src="Image/images-design/trait-gauche.png"/></aside>
				<aside id="trait-droit2"><img src="Image/images-design/trait-droit.png"/></aside>
				<article id="titre2">ou</article>
				
			</div>
			
			<div id="boutons-fbook-google">
			<aside id="bouton-fbook"><a href="form-creer-compte.php" valign="middle" >Créer un compte</a></aside>
			<!--<aside id="bouton-google"><a href="connexion-google-plus.php">Se connecter avec Google +</a></aside>-->
			</div>
			
	</section>
<!--Fin section conteneur-->
<?php
	include(dirname(__FILE__)."/footer.php");
?>
</body>
</html>
