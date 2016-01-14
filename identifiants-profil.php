<!DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
		<link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />
	</head>
	
<body>
	<?php
	include(dirname(__FILE__)."/header.php");
	?>
<section class="conteneur-superieur">	
	<div class="conteneur">
<?php

		include("auth.php");
		include("db_config.php");

		
		$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
		$db = mysql_select_db($DB_select, $conn);
		if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
		
		?>
			<h1>
				Mise à jour du profil :
			</h1><h2 style="padding-left: 30px">
		<?php
                if(isset($_POST['uid']))
                {
                    $uid=$_POST['uid'];
            if(isset($_POST['mdp']))
			{
				$mdp=md5(mysql_real_escape_string($_POST['mdp']));	
				if($mdp!="")
				{
					$SQL8="UPDATE utilisateurs SET mdp='$mdp' WHERE uid='$uid'";
					$result8 = mysql_query($SQL8);
					echo "--> Votre mot de passe est à jour";
				}
				
			}
			
			if(isset($_POST['email']))
			{
				$email = mysql_real_escape_string($_POST['email']);	
				 if($email!="")
				{
					$SQL11="UPDATE utilisateurs SET email='$email' WHERE uid='$uid'";
					$result11 = mysql_query($SQL11);
					echo "--> Votre e-mail est à jour";
				}
			}
			?>
				<br><br>
				<center>
					<img type="big" src="image-site/MAJ-profil.jpg" alt="MAJ-profil" width="100%" height="100%">
				</center>
				<br>
				<center>
					<a href="index.php">Retourner à l'accueil</a> <br>ou<br> <a href="afficher-profil-eleve.php?eid=<?php echo $eid;?>">Voir profil</a>
				</center>
				</h2>
			<?php
		}//fin if(cid)
		
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