<link href="style/style-actualite.css" rel="stylesheet" media="all" type="text/css">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="lib/fancy-box/source/rollover-effect.css" type="text/css" media="screen"/>

<a href="page-actualite.php">
	<span class="roll-actualite">
		<div class="text-content-roll-actu">Découvrir toute l'actualité</div>
	</span>

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
	<aside id="image-actu"> 
		<!--image de l'actualité -->
		<img src="uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps" width="100%" height="100%">
	</aside> 

	<div style="width: 270px; float: right; overflow: hidden; height: 210px">
		<article id="titre-actu">
			<p>
			<!--titre de l'actualité, max 20 caractères-->
				<?php
					echo $titre;
				?>
			</p> 
		</article> 
			
		<article id="text-actu"> 
			<p>
			<!--texte de l'actualité max 460 caractères-->
				<?php
					echo $descriptif;
				?>
			</p>
		</article>
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