<link href="style/style-actualite.css" rel="stylesheet" media="all" type="text/css">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="../lib/fancy-box/source/rollover-effect.css" type="text/css" media="screen"/>

<?php
	include("db_config.php");
	mysql_set_charset ('UTF8');
	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	$SQL="SELECT * FROM actualite ORDER BY aid DESC";
	$result=mysql_query($SQL);
	if(!$result||mysql_num_rows($result)==0) 
		{
?>			<script>
				alert("PROBLEME BASE DE DONNEES");
			</script>
<?php
		}
	else
		{
			$row=mysql_fetch_array($result);
			$photo=htmlspecialchars($row['photo']);
			$titre=htmlspecialchars($row['titre']);
			$descriptif=htmlspecialchars($row['descriptif']);
?>

	<div id="conteneur-actu-complet2">
		<!-- photo -->
		<div id="image-profil-complet">
			<a href="page-actualite.php">
				<img id="image-profil-complet" src="/uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps">
			</a>
		</div>
						
						
		<!-- titre -->
		<div id="titre-actu-complet2">
			<p>
			<?php
				echo nl2br($titre);
			?>
			</p>
		</div>
						
		<!-- texte -->
		<div id="text-commentaire-complet"> 
			<p style="text-align: center">
			<?php
				echo nl2br($descriptif);
			?>
			</p>
		</div>
	</div>
</a>

		<script type="text/javascript">
			$(function() {
			<!--OPACITY OF BUTTON SET TO 0%-->
			$(".roll-actualite").css("opacity","0");
			 
			// ON MOUSE OVER
			$(".roll-actualite").hover(function () {
			 
			// SET OPACITY TO 70%
			$(this).stop().animate({
			opacity: .7
			}, "slow");
			},
			 
			// ON MOUSE OUT
			function () {
			 
			// SET OPACITY BACK TO 50%
			$(this).stop().animate({
			opacity: 0
			}, "slow");
			});
			});
		</script>
<?php
		}
?>