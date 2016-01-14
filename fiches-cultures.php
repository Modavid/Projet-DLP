<!DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		
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
include("auth.php");
include("db_config.php");
	mysql_set_charset('UTF8');
	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	
	if(!isset($_SESSION['AUTH']))
	{
	}
	else if($_SESSION['AUTH']==2 || $_SESSION['AUTH']==1)
	{
		/*$userid=$_SESSION['USERID'];
		
		$SQL1="SELECT * FROM collectif WHERE cid='$userid'";
		$result1=mysql_query($SQL1);
		if(!$result1||mysql_num_rows($result1)==0)
		{
			?>
				<script>
					alert('PROBLEME BASE DE DONNEE');
				</script>
			<?php
		}
		else
		{
			*/$row1=mysql_fetch_array($result1);
			$dcult=htmlspecialchars($row1['dcult']);
			if($_SESSION['AUTH']==1) // On verifie si le prof/membre a le droit de creer une fiches cultures.
			{
				if(isset($_POST['titre']) && isset($_POST['texte']))
				{
					$texte = mysql_real_escape_string($_POST['texte']);
					$titre = mysql_real_escape_string($_POST['titre']);
					
					$SQL="SELECT * FROM cultiver WHERE titre='$titre'";
					$result = mysql_query($SQL);
					$row=mysql_num_rows($result);
					if($row != 0)
					{
						?>
							<script>
								alert('Une fiche avec les meme titre existe deja.');
							</script>
							<h2 style="padding-left: 30px">
								<a href="index.php">Index</a>
							</h2>
						<?php
					}
					else
					{		
							if(isset($_FILES["myfile"]))
							{
								$name = mysql_real_escape_string($_FILES["myfile"]["name"]);
								$type = $_FILES["myfile"]["type"];
								$size = $_FILES["myfile"]["size"];
								$temp = $_FILES["myfile"]["tmp_name"];
								$error = $_FILES["myfile"]["error"];
								
								
								if($error>0)
								{
									echo "ERREUR";
								}
								else
								{
									move_uploaded_file($temp,"uploaded/".$name);
									$SQL="INSERT INTO cultiver (titre,photo,texte) VALUES ('$titre','$name','$texte')";
									$result = mysql_query($SQL);
									
									if($result)
									{
										?> 
											<h2 style="padding-left: 30px">
												Votre fiche a été rajouté
												<br><br>
												<a href="se-cultiver.php">Voir les fiches cultures</a>
											</h2>
										<?php
									}
									else
									{
										?>
											<script>
												alert('PROBLEME BASE DE DONNEES');
											</script>
											<a href="index.php">Index</a>
										<?php
									}
									
									
								}
							}
							
					}
				}
			}
		//}
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
