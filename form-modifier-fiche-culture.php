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

if(!isset($_SESSION['AUTH']))
{
}
else if($_SESSION['AUTH']==2||$_SESSION['AUTH']==1)
{
	if(isset($_GET['cuid']))
	{
		$cuid=htmlspecialchars($_GET['cuid']);
		$SQL="SELECT * FROM cultiver where cuid='$cuid'";
		$result=mysql_query($SQL);
		if(mysql_num_rows($result) == 1)
		{
			$tab=mysql_fetch_array($result);
			$titre=htmlspecialchars($tab['titre']);
			$texte=htmlspecialchars($tab['texte']);
			?>
			<h1>Modifier une fiche culture</h1>
			
			<div class="text-bloc1">
				<p>Un peu d'histoire !<p>
			</div>
			
				<form method="post" action="modifier-fiche-culture.php" class="formulaire" enctype="multipart/form-data">
					
					<input type="hidden" name="cuid" value="<?php echo $cuid;?>">
					
					<section>
						<span class="titre-ligne">Titre</span>
						<input type="text" name="titre" value="<?php
							echo $titre;
						?>" required>
					</section><br>
					
					<section>
						<span class="titre-ligne">Texte</span>
						<textarea input type="text" name="texte"required cols="40" rows="20"><?php
							echo $texte;
						?></textarea>
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
	}
	else
	{
		?>
			<p>
				Acc?s refus?.
			</p>
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
