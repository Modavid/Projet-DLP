<!DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
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
	<?php
	include(dirname(__FILE__)."/header.php");
	?>
<section class="conteneur-superieur">	
	<div class="conteneur">
	
<?php
include('auth.php');
include('db_config.php');

	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	if(!isset($_SESSION['AUTH']))
	{
	}
else if($_SESSION['AUTH']==2||$_SESSION['AUTH']==1)
{
	if($daddp==1||$_SESSION['AUTH']==1)
		{
			$eid=$_GET['eid'];
			$nom=$_GET['nom'];
			$prenom=$_GET['prenom'];
			
			?>
			<div class="block-formulaire">
			<h1>Ajouter un portrait</h1>
			
			<div class="text-bloc1">
				<p>Prenons des nouvelles de nos anciens !</br>Les liens rentres dans le texte seront cliquables.<p>
			</div>
			
			<form method="post" action="ajouter-portrait.php" enctype="multipart/form-data" class="formulaire">

				<input type="hidden" name="eid" value="<?php echo $eid;?>">
				<section>	
					<span class="titre-ligne">Nom</span>
					<input type="text" name="nom" value="<?php echo $nom;?>" required>
				</section><br>
					
				<section>
					<span class="titre-ligne">Prenom</span>
					<input type="text" name="prenom" value="<?php echo $prenom;?>" required>
				</section><br>

				<section>
					<span class="titre-ligne">Titre</span>
					<textarea name="titre" cols="30" rows="1" required>PolaMIR <?php echo $nom.' '.$prenom;?></textarea>
				</section><br>
					
				<section>
					<span class="titre-ligne">Photo</span>
					<input type='file' name='myfile' required>
				</section><br>
					
				<section>
					<span class="titre-ligne">Lien article</span>
					<textarea name="article" rows="3" cols="40" required></textarea>
				</section><br><br>
			   
				<input type="submit" value="Envoyer">
				<br/><br/>
			</form>
			</div>

			<?php
		}
}
	
mysql_close($conn);
?>

	</div>
	<!-- Fin div conteneur -->
	<?php
			include(dirname(__FILE__)."/barre-laterale.php");
			?>
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
