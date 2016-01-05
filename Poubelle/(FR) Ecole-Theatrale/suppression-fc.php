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
		
		if(isset($_GET['uid']) && isset($_SESSION['AUTH']) == 1)//ADMIN
		{
			$uid =mysql_real_escape_string($_GET['uid']);
			$SQL="SELECT * FROM utilisateurs WHERE uid='$uid'";
			$result=mysql_query($SQL);
                        $row=mysql_fetch_array($result);
		
			
			$type=htmlspecialchars($row['type']);
                        $photo=htmlspecialchars($row['photo']);
                        
			
			if(mysql_num_rows($result)==0)
			{
				?>
					<script>
						alert('Cet utilisateur n\'existe pas !');
					</script>
				<?php
			}
			else
			{
				
				$SQL2="DELETE FROM profil WHERE uid='$uid'";
				
				$SQL4="DELETE FROM utilisateurs WHERE uid='$uid'";
				$SQL5="DELETE FROM photo WHERE uid='$uid'";
				
                                $result2 = mysql_query($SQL2);
                                $result4 = mysql_query($SQL4);
                                $result5 = mysql_query($SQL5);
                                unlink("uploaded/".$type."s/".$photo);
                                
				if($result2 && $result4 && $result5)
				{
					?> 
						<p>
							<h2 style="padding-left: 30px">Utilisateur correctement supprime</h2>
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