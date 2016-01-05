<!DOCTYPE html >
		<?php
	include(dirname(__FILE__)."/header.php");
	?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		
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
	include("db_config.php");
	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }

	if( isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['type'])  && isset($_POST['fb_id']) && isset($_POST['fb_image']) && isset($_POST['fb_name']))
		{
			$nom=mysql_real_escape_string($_POST['nom']);
			$prenom=mysql_real_escape_string($_POST['prenom']);
			$type=mysql_real_escape_string($_POST['type']);
			$fb_id=mysql_real_escape_string($_POST['fb_id']);
			$fb_image=mysql_real_escape_string($_POST['fb_image']);
			$fb_name=mysql_real_escape_string($_POST['fb_name']);
			
			
		}
	
	if($type=="etudiant")
	{
		$SQL="SELECT * FROM etudiants WHERE nom='$nom' $$ prenom='$prenom'";
		$result=mysql_query($SQL);
		if(!$result||mysql_num_rows($result))
		{
			?>
				<div>
					Vous avez mal saisie vos données.
					Veuillez réessayer.
				</div>
			<?php
		}
		else if(mysql_num_rows($result)==1)
		{
			$SQL1="UPDATE etudiants SET facebook_id='$fb_id' , photofacebook='$fb_image' , pseudofacebook='$fb_name' WHERE nom='$nom' && prenom='$prenom'";
			$result1=mysql_query($SQL1);
			
			if(!$result1)
			{
				?>
				<script>
					alert('PROBLEME CHARGEMENT');
				</script>
				<?php
			}
			else
			{
				?>
					<div>
					<p>Vous venez de lier votre compte facebook à notre site Demain le Printemps.
					Veuillez patienter que l'Administrateur valide votre inscription.</p>
					</div>
				<?php
			}
		}
		else 
		{
			?>
			<p>
				Qui êtes vous ? 
			</p>
			<?
			while($row=mysql_fetch_array($result))
			{
			$photo=htmlspecialchars($row['photo']);
			$nom=htmlspecialchars($row['nom']);
			$prenom=htmlspecialchars($row['prenom']);
			$eid=htmlspecialchars($row['eid']);
			
				?>
					<!-- photo -->
					<aside>
						<img src="uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps" width="200px" height="200px">
					</aside>
					
					
					<!-- nom et prenom -->
					<p>
						<a href="lier-compte-facebook-etudiant-multiple.php?eid=<?php echo $eid; ?>&amp;facebook_id=<?php echo $fb_id;?>&amp;pseudofacebook=<?php echo $fb_name?>&amp;photofacebook=<?php echo $fb_image?>"><?php echo $nom,$prenom; ?></a>
					</p>
				<?php
			}
		}
	
	}
	else if($type=="professeur"||$type=="membre")
	{
		$SQL2="UPDATE collectif SET facebook_id='$fb_id' , photofacebook='$fb_image' , pseudofacebook='$fb_name' WHERE nom='$nom' && prenom='$prenom'";
		$result2=mysql_query($SQL2);
		if(!$result2)
		{
			?>
				Vous avez mal saisie vos donnez, Veuillez recommencer.
			<?php
		}
		else
		{
			?>
				<div>
				<p>Vous venez de lier votre compte facebook à notre site Demain le Printemps.
				Veuillez patienter que l'Administrateur valide votre inscription.</p>
				</div>
			<?php
		}
	}
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