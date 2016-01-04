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
		<link href="style/style-formluaire.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-form.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	</head>
	
<body>

<section class="conteneur">
	<section class="block-formulaire">
		<div id="block-connexion">
			<div id="trait-gauche"><img id="trait-gauche" src="/images-design/trait-gauche.png"/></div>
			<div id="titre">Connexion</div>
			<div id="trait-droit"><img id="trait-droit" src="/images-design/trait-droit.png"/></div>
		</div>
			
			
			<form method="post" action="auth.php" class="formulaire">
			<section class="ligne">
			   <span class="titre-ligne">Login</span>
			   <input type="text" name="login" value=""required/>
			</section>
			   
			 <section class="ligne">
			   <span class="titre-ligne">Mot de passe</span>
			   <input type="password" name="mdp" value="" required/>
			 </section>
			 
			   <input type="submit" value="Se connecter">
			   
			</form>
			
			<div id="block-connexion">
			
				<div id="trait-gauche"><img id="trait-gauche" src="/images-design/trait-gauche.png"/></div>
				<div id="titre">ou</div>
				<div id="trait-droit"><img id="trait-droit" src="/images-design/trait-droit.png"/></div>
				
			</div>
			
			<div id="boutons-fbook-google">
			<aside id="bouton-fbook"><a href="connexion-facebook.php" valign="middle" >Se connecter avec Facebook</a></aside>
			<!--<aside id="bouton-google"><a href="connexion-google-plus.php">Se connecter avec Google +</a></aside>-->
			</div>
			
	</section>
<!--Fin section conteneur-->
<?php
	include(dirname(__FILE__)."/footer.php");
?>
</body>
</html>
