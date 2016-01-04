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

if(isset($_POST['titre']) && isset($_POST['commentaire']))
{
	$titre=mysql_real_escape_string($_POST['titre']);
	$commentaire=mysql_real_escape_string($_POST['commentaire']);

	if($_SESSION['FACEBOOK']==0)
	{
		$type=0;
	}
	if($_SESSION['FACEBOOK']==1)
	{
		$type=1;
	}
	
	$eid=$_SESSION['USERID'];
	
	$SQL="INSERT INTO temoignages(eid,titre,com,type) VALUES ('$eid','$titre','$commentaire','$type')";
	$result=mysql_query($SQL);
	
	if(!$result)
	{
		echo "Erreur";
	}
	else
	{
			
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
		$message_txt = 'Bonjour,'.$passage_ligne.$passage_ligne.$prenom.' '.$nom.' voudrait ajouter un témoignage et attend sa validation, voici les détails :'.$passage_ligne;
		$message_txt.='- titre : '.$titre.$passage_ligne.'- texte : '.$commentaire.$passage_ligne.$passage_ligne.'Merci';
		
		//=====Création de la boundary
		$boundary = "-----=".md5(rand());
		//==========
		 
		//=====Définition du sujet.
		$sujet = '[Témoignage] '.$nom.' '.$prenom;
		//=========
		 
		//=====Création du header de l'e-mail.
		$header = "From: \"DLP\"<demainleprintemps@gmail.com>".$passage_ligne;
		$header.= "Reply-to: \"DLP\" <demainleprintemps@gmail.com>".$passage_ligne;
		$header.= "MIME-Version: 1.0".$passage_ligne;
		$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
		 
		//=====Envoi de l'e-mail.
		mail($mail,$sujet,$message_txt,$header);
		//==========
		?>
		<br>
		<center>
			<img type="big" src="/images-site/remerciement.jpg" alt="Félicitation" width="100%" height="100%">
		</center>
		<br><br>
		<div align="center">
			Veuillez patienter que l'administrateur valide votre témiognage.<br>
			Si la validation prends plus de quelques jours, vous pouvez envoyer un mail à demainleprintemps@gmail.com ou nous appeller au 01 42 81 33 96.
		</div>
		<?php
	}
}
?>
<center>
	<a href="index.php">Retour à l'accueil</a> 
</center>
		</h2>
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
