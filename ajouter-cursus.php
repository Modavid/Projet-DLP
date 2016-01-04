<!DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		
		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
		<link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />
		
	</head>
	
<body>
	<?php
	include(dirname(__FILE__)."/header.php");
	?>
	<section class="conteneur-superieur">	
		<div class="conteneur">
			<h2 style="padding-left: 15px;padding-right: 15px">
			<?php
			include("auth.php");
			include("db_config.php");

			$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
			$db = mysql_select_db($DB_select, $conn);
			if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	
			if(!isset($_SESSION['AUTH']))
			{
			}
			else if($_SESSION['AUTH']==2 || $_SESSION['AUTH']==1)
			{
				$dcult=htmlspecialchars($row1['dadde']);
				if($dadde==1 || $_SESSION['AUTH']==1) // On verifie si le prof/membre a le droit de creer une fiches cultures.
					{if(!empty($_POST['eid']))
						{
							$eid = mysql_real_escape_string($_POST['eid']);
			
							if(isset($_POST['cursus']) && isset($_POST['lieu']) && isset($_POST['date']) && isset($_POST['mois']) )
							{
								$cursus = $_POST['cursus'];
								$date = $_POST['date'];
								$lieu = $_POST['lieu'];
								$mois = $_POST['mois'];	
						
								$SQL1="INSERT INTO cursus(eid,type,lieu,mois,annee) VALUES ('$eid','$cursus','$lieu','$mois','$date')";
								$result1 = mysql_query($SQL1);
		
		
		
		
							}
						}		
		
					}
			}	
			?>	
			<a href="index.php">Retour a l'accueil</a><?php mysql_close($conn);?>
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