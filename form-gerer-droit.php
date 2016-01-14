<!DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-form.css" rel="stylesheet" media="all" type="text/css">
		
		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
		<link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />
	</head>
	
<body>
	<?php
		include(dirname(__FILE__)."/header.php");
	?>
	<section class="conteneur-superieur">	
		<div class="conteneur">
			<br><br>
			<?php
			include('auth.php');
			include('db_config.php');
			
			mysql_set_charset('UTF8');
			$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
			$db = mysql_select_db($DB_select, $conn);
			if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
			
			$uid=$_GET['uid'];
			
			$SQL="SELECT * FROM utilisateurs WHERE uid='$uid'";
			$result=mysql_query($SQL);
			
			while($row=mysql_fetch_array($result)){
				$type=$row['type'];
				$nom=$row['nom'];
			}
	
			if($_SESSION['AUTH']==1)
			{
				echo $type;
				echo $nom;
				echo $uid;
				if($type=="admin")
				{
					?>
					<p>Voulez vous retirez les droits d\'administration à cet utilisateur ?:</p>
					<br>
					<a href="validation-droit.php?valid=1">Valider</a><br>
					<a href="gerer-droit.php">Retourner à la gestion des droits</a>
					<?php
				}
				else
				{
					?>
					<p>Voulez vous donnez les droits d\'administration à cet utilisateur ?:</p>
					<br>
					<a href="validation-droit.php?valid=2">Valider</a><br>
					<a href="gerer-droit.php">Retourner à la gestion des droits</a>
					<?php
				}
			}
			else
			{
				?>
				<script>
					alert('ACCES NON AUTORISE');
				</script>
				<?php
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