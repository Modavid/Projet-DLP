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
			{
				if(isset($_POST['cursus']) && isset($_POST['email']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['mois']) && isset($_POST['date']) && isset($_POST['lieu']))
				{			
							$email = $_POST['email'];
							$type = $_POST['cursus'];
							$nom = $_POST['nom'];
							$prenom = $_POST['prenom'];
							$date = $_POST['date'];
							$lieu = $_POST['lieu'];
							$mois = $_POST['mois'];

							$SQL="SELECT nom, prenom, email FROM etudiants WHERE nom='$nom' && prenom='$prenom' && email='$email'";
							$result = mysql_query($SQL);
							$row=mysql_fetch_array($result);
									
							if($row < 1 && isset($_FILES["myfile"]))
							{
								$name = $_FILES["myfile"]["name"];
								$size = $_FILES["myfile"]["size"];
								$temp = $_FILES["myfile"]["tmp_name"];
								$error = $_FILES["myfile"]["error"];
								
								if($error>0)
								{
									echo "UPLOAD_ERR : ".$error;
								}
								else
								{
									move_uploaded_file($temp,"uploaded/".$name);
									$SQL="INSERT INTO etudiants(email,nom,prenom,photo,type,date,lieu,mois) VALUES ('$email','$nom','$prenom','$name','$type','$date','$lieu','$mois')";
									$result = mysql_query($SQL);
									
									if($result)
									{
										?> 
											Votre fiche a été rajouté
										<?php
									}
									else
									{
										?>
											<script>
												alert('PROBLEME BASE DE DONNEES');
											</script>
										<?php
									}
									
									
								}
							}
							if ($row > 0)
							{
								?>
									<script>
										alert('L\'etudiant existe deja dans la base de donnée. Si deux etudiants ont le meme nom et prenom, veuillez ajouter une adresse email pour les différencier.');
									</script>
								<?php
							}
							
				
				}
			}
	}
	?><a href="index.php">Retour a l'accueil</a><?php
	
mysql_close($conn);
?>

		</h2>
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
