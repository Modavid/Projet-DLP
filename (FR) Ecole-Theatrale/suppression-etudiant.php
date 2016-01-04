<!DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		
		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
		<script type="text/javascript">
		</script>
		
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
		if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
		$db = mysql_select_db($DB_select, $conn);
		
		if(isset($_GET['eid']) && isset($_SESSION['AUTH']) == 1)//ADMIN
		{
			$eid =mysql_real_escape_string($_GET['eid']);
			$SQL="SELECT eid FROM etudiants WHERE eid='$eid'";
			$result=mysql_query($SQL);
			
			if(mysql_num_rows($result)==0)
			{
				?>
					<script>
						alert('Cet etudiant n\'existe pas !');
					</script>
				<?php
			}
			else
			{
				$SQL="DELETE FROM temoignages WHERE eid='$eid'";
				$SQL2="DELETE FROM profil WHERE eid='$eid'";
				$SQL3="DELETE FROM etudiants WHERE eid='$eid'";
				$SQL4="DELETE FROM utilisateurs WHERE eid='$eid'";
				$SQL5="DELETE FROM photo WHERE eid='$eid'";
				$result = mysql_query($SQL);
                                $result2 = mysql_query($SQL2);
                                $result4 = mysql_query($SQL4);
                                $result5 = mysql_query($SQL5);
                                $result3 = mysql_query($SQL3);
				if($result && $result2 && $result3 && $result4 && $result5)
				{
					?> 
						<p>
							<h2 style="padding-left: 30px">Etudiant(e) correctement supprime(e)<h2>
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
		
		<?php
			include(dirname(__FILE__)."/barre-laterale.php");
		?>
	<!--Fin section conteneur-superieur-->
	</section>

	<?php
		include(dirname(__FILE__)."/footer.php");
	?>
</body>
</html>