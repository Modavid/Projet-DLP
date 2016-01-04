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

if(isset($_POST['titre']) && isset($_POST['commentaire']) && isset($_POST['tid']))
{
	$titre=mysql_real_escape_string($_POST['titre']);
	$commentaire=mysql_real_escape_string($_POST['commentaire']);
	$tid=mysql_real_escape_string($_POST['tid']);

	if($_SESSION['FACEBOOK']==0)
	{
		$type=0;
	}
	if($_SESSION['FACEBOOK']==1)
	{
		$type=1;
	}
	
	$eid=$_SESSION['USERID'];
	
	$SQL="UPDATE `temoignages` SET `titre`='$titre', `com`='$commentaire', `valider`='3' WHERE `tid`='$tid'";
	$result=mysql_query($SQL);
	
	if(!$result)
	{
		echo "Erreur";
	}
	else
	{
		if ($_SESSION['AUTH'] != 1)
		{
			$mail = 'demainleprintemps@gmail.com'; // D�claration de l'adresse de destination.
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
			//=====D�claration des messages au format texte et au format HTML.
			$message_txt = 'Bonjour,'.$passage_ligne.$passage_ligne.$prenom.' '.$nom.' voudrait modifier un t�moignage et attend sa validation, voici les d�tails :'.$passage_ligne;
			$message_txt.='- titre : '.$titre.$passage_ligne.'- texte : '.$commentaire.$passage_ligne.$passage_ligne.'Merci';
			
			//=====Cr�ation de la boundary
			$boundary = "-----=".md5(rand());
			//==========
			 
			//=====D�finition du sujet.
			$sujet = '[T�moignage - modification] '.$nom.' '.$prenom;
			//=========
			 
			//=====Cr�ation du header de l'e-mail.
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
			$SQL="UPDATE `temoignages` SET `valider`='1' WHERE `tid`='$tid'";
			$result=mysql_query($SQL);
		}
		?>
		<br>
		<center>
			<img type="big" src="/images-site/remerciement.jpg" alt="F�licitation">
		</center>
		<br><br>
		<div align="center">
			Veuillez patienter que l'administrateur valide la modification de votre t�miognage.<br>
			Si la validation prends plus de quelques jours, vous pouvez envoyer un mail � demainleprintemps@gmail.com ou nous appeller au 01 42 81 33 96.
		</div>
		<?php
	}
}
?>
<center>
	<a href="index.php">Retour a l'accueil</a> 
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
