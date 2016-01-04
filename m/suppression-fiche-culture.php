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
		</script>
		
	</head>
<body>

	<section class="conteneur-superieur">	
	<div class="conteneur">
	<?php
		include("auth.php");
		include("db_config.php");
		$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
		if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
		$db = mysql_select_db($DB_select, $conn);
		
		if(isset($_GET['cuid']) && isset($_SESSION['AUTH']) == 1)//ADMIN
		{
			$cuid =mysql_real_escape_string($_GET['cuid']);
			$SQL="SELECT cuid FROM cultiver WHERE cuid='$cuid'";
			$result=mysql_query($SQL);
			
			if(mysql_num_rows($result)==0)
			{
				?>
					<script>
						alert('Cette fiche n\'existe pas !');
					</script>
				<?php
			}
			else
			{
				$SQL="DELETE FROM cultiver WHERE cuid='$cuid'";
				$result = mysql_query($SQL);
				
				if($result)
				{
					?> 
						<p>
							<h2 style="padding-left: 30px">Fiche correctement supprimee<h2>
						</p>
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
		?><h1><a href="index.php">Retourner a l'accueil</a></h1><?php
		mysql_close($conn);
	?>
<!--Fin div conteneur-->
		</div>
	<!--Fin section conteneur-superieur-->
	</section>

	<?php
		include(dirname(__FILE__)."/footer.php");
	?>
</body>
</html>