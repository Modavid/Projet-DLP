<!DOCTYPE html >
<html>
	<head>
		<title>Ajouter une actualité</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-form.css" rel="stylesheet" media="all" type="text/css">
		
		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
		<link rel="icon" type="image/png" href="/Image/images-design/mafavicon-1.ico" />
	</head>
	
<body>
	<?php
	include(dirname(__FILE__)."/header.php");
	?>
<section class="conteneur-superieur">	
	<div class="conteneur">
	
<?php 
include('auth.php');
include("db_config.php");
mysql_set_charset('UTF8');
	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	
if($_SESSION['AUTH']==2||$_SESSION['AUTH']==1)
{
	if($dactu==1 || $_SESSION['AUTH']==1)
	{
		?>
		<h1>Ajouter une Actu</h1>
		<div class="text-bloc1">
			<p>Quoi de neuf ?!</br>Les liens rentres dans le texte et dans le descriptif seront cliquables.<br>Le lien sera ouvert lors de click sur la photo.<p>
		</div>
		
		<form method="post" action="ajouter-actu.php" enctype="multipart/form-data" class="formulaire">
			
			<section>
				<span class="titre-ligne">Titre</span>
				<textarea name="titre" cols="25" rows="2" maxlength="60" required></textarea>
			</section><br>
		   
			<section>
				<span class="titre-ligne">Descriptif</span>
				<textarea name="descriptif" cols="30" rows="10" maxlenght="460" required></textarea>
			</section><br>
		   
			<section>
				<span class="titre-ligne">Texte</span>
				<textarea name="texte" cols="40" rows="15" required></textarea>
			</section><br>
			
			<section>
				<span class="titre-ligne">Photo</span>
				<input type="file" name="myfile">
			</section><br>
			
			<section>
				<span class="titre-ligne">Lien</span>
				<textarea name="lien" cols="30" rows="2" maxlength="250" required></textarea>
			</section><br><br>
			
			<input type="submit" value="Envoyer">
		   
		</form>
		<?php
		}
		else
		{
			?>
				<script>
					alert('ACCES REFUSE');
				</script>
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
