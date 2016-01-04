<!DOCTYPE html >
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
		
		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
			
// fade-effet pour les images			
//				$('.fancybox').animate({
//					opacity:.5
//				
//				
//				});
//				$('.fancybox').hover(function(){
//					$(this).stop().animate({opacity:1});
//				}, function(){
//					$(this).stop().animate({opacity:.5});
//				
//				});
			});
		</script>
		
	</head>
	
<body>

<section class="conteneur-superieur">	
	<div class="conteneur">
<?php
include('auth.php');
include("db_config.php");
mysql_set_charset('UTF8');
	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	
if(!isset($_SESSION['AUTH']))
{
}
else if($_SESSION['AUTH']==2||$_SESSION['AUTH']==1)
{
	if($dcult==1||$_SESSION['AUTH']==1) // On verifie si le prof/membre a le droit de creer une fiches cultures.
		{
			?>
			<h1>Ajouter une fiche culture</h1>
			
			<div class="text-bloc1">
				<p>Un peu d'histoire !</br>Les liens rentres dans le texte seront cliquables.<p>
			</div>
			
				<form method="post" action="fiches-cultures.php" class="formulaire" enctype="multipart/form-data">
					
					<section>
						<span class="titre-ligne">Titre</span>
						<input type="text" name="titre"required>
					</section><br>
				   
					<section>
						<span class="titre-ligne">Texte</span>
						<textarea input type="text" name="texte"required cols="40" rows="20"></textarea>
					</section><br>
					
					<section>
						<span class="titre-ligne">Photo</span>
						<input type="file" name="myfile">
					</section>
					
					<br/><br/>
				<input type="submit" value="Envoyer">
				<br><br>
			   
				</form>
			<?php
		}
		else
		{
			?>
				<p>
					Accès refusé.
				</p>
			<?php
		
		}
}
mysql_close($conn);
?>
</div> 
	<!-- Fin div conteneur -->
	<!--Fin section conteneur-superieur-->
</section>
	<!-- Add jQuery library -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<!-- Add fancyBox -->
	<link rel="stylesheet" href="/source/jquery.fancybox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="/source/jquery.fancybox.pack.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			$(".fancybox").fancybox({
			    	helpers: {
			    	              title : {
			    	                  type : 'float'
			    	              }
			    	          }
			    });
		});
	</script>
	
	<?php
		include(dirname(__FILE__)."/footer.php");
	?>
	</body>
</html>
