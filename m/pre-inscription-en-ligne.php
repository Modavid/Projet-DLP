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
		<link href="style/style-nos-eleves.css" rel="stylesheet" media="all" type="text/css">
		
		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {

			});
		</script>
		
	</head>
	
<body>

<section class="conteneur-superieur">	
	<div class="conteneur">
<?php
include("auth.php");
include("db_config.php");
	
	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	
	if(isset($_POST['nom']) &&  isset($_POST['prenom']) && isset($_POST['type']) && isset($_POST['ville']) && isset($_POST['email']) && isset($_POST['numero']))
		{
			$nom = mysql_real_escape_string($_POST['nom']);
			$prenom = mysql_real_escape_string($_POST['prenom']);
			$type= mysql_real_escape_string($_POST['type']);
			$ville = mysql_real_escape_string($_POST['ville']);
			$email = mysql_real_escape_string($_POST['email']);
			$numero = mysql_real_escape_string($_POST['numero']);
			
			$total= $nom.$prenom.$ville.$email.$type.$numero;
		
			$mail = 'demainleprintemps@gmail.com'; // Déclaration de l'adresse de destination.
			if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
			{
				$passage_ligne = "\r\n";
			}
			else
			{
				$passage_ligne = "\n";
			}

			ini_set('SMTP','smtp.orange.fr');
			ini_set("sendmail_from","demainleprintemps@gmail.com");
			//=====Déclaration des messages au format texte et au format HTML.
			$message_txt = 'Bonjour,'.$passage_ligne.$passage_ligne.$prenom.' '.$nom.' vient de faire une demande de pré-inscription, voici les détails :'.$passage_ligne;
			$message_txt.='- type de formation : '.$type.$passage_ligne.'- ville : '.$ville.$passage_ligne.'- mail : '.$email.$passage_ligne.'- numéro : '.$numero.$passage_ligne.$passage_ligne.'Merci';
			
			//=====Création de la boundary
			$boundary = "-----=".md5(rand());
			//==========
			 
			//=====Définition du sujet.
			$sujet = '[Demande de pré-inscription] '.$nom.' '.$prenom;
			//=========
			 
			//=====Création du header de l'e-mail.
			$header = "From: \"DLP\"<demainleprintemps@gmail.com>".$passage_ligne;
			$header.= "Reply-to: \"DLP\" <demainleprintemps@gmail.com>".$passage_ligne;
			$header.= "MIME-Version: 1.0".$passage_ligne;
			$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
			 
			//=====Envoi de l'e-mail.
			mail($mail,$sujet,$message_txt,$header);
			//==========
		}
		else
		{
			?>
				<script>
					alert('Problème de récupération des coordonnées.');
				</script>
			<?php
		}
	
		
    
?>
<h2>
<div align="center">
	<h1>Bienvenue !</h1>
		Un mail vient de nous être envoyé pour nous signaler votre demande de pré-inscription.<br>
		Vous pouvez envoyer un mail à demainleprintemps@gmail.com <br>ou nous appeller au 01 42 81 33 96 pour plus d'informations.
</div>
<br><br>
<img type="big" src="/images-site/RideauTheatre.jpg" alt="Bienvenue">
<br>
<center>
	<a href="index.php">Retourner à l'accueil</a> 
</center>
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