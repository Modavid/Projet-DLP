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
	<h2 style="padding-left: 15px; padding-right: 15px">
<?php

include("db_config.php");

	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	
if(isset($_POST['nom']) && ($_POST['prenom']) && ($_POST['type']) && ($_POST['email']) && ($_POST['log']) && ($_POST['mdp']) && ($_POST['password']))
{
	$nom=mysql_real_escape_string($_POST['nom']);
	$prenom=mysql_real_escape_string($_POST['prenom']);
	$type=mysql_real_escape_string($_POST['type']);
	$email=mysql_real_escape_string($_POST['email']);
	$login=mysql_real_escape_string($_POST['log']);
	$password=md5(mysql_real_escape_string($_POST['password']));
	$mdp=md5(mysql_real_escape_string($_POST['mdp']));

	
	// On commence par voir si le login saisie n'existe pas déjà. S'il existe, alors on demande a l'utilisateur de choisir un autre login.
	
	$SQL2="SELECT * FROM utilisateurs WHERE login='$login'";
	$result2=mysql_query($SQL2);
	if(!$result2 || mysql_num_rows($result2)==0)
	{
		// On verifie ensuite si les mots de passes saisie sont identiques. S'il ne le sont pas, alors on demande a l'utilisateur de ressaisir les mots de passes.
		if(strcmp($password,$mdp)==0)
		{
			if($type=="Etudiant")
				{
					$SQL="SELECT * FROM etudiants WHERE prenom='$prenom' && nom='$nom'";
					$result=mysql_query($SQL);
					$row=mysql_fetch_array($result);
					$i=mysql_num_rows($result);
					if(!$result || $i==0)
						{
							?>
								<div class="">
									Vous n'êtes pas un étudiant. 
									S'il y a une erreur, veuillez contacter l'administrateur afin qu'il vous identifie.<br>
									Merci.
								</div>
							<?php
						}
					else if($i==1) // On verifie si l'etudiant n'existe pas en multiple. Si non, alors on peut directement l'inserer dans la base de données d'utilisateurs.
						{
							$eid=htmlspecialchars($row["eid"]);
							
							$SQL3="SELECT * FROM utilisateurs WHERE eid='$eid'";
							$result3=mysql_query($SQL3);
							if(!$result3||mysql_num_rows($result3)==0) // On verifie si cette personne n'a pas déjà créer un compte.
							{
								$SQL1="INSERT INTO utilisateurs(eid,cid,nom,prenom,email,login,mdp,valider) VALUES ('$eid','0','$nom','$prenom','$email','$login','$password','0')";
								$result1 = mysql_query($SQL1);
								if(!$result1)
									{
										?>
											<script>
												alert("PROBLEME BASE DE DONNEE.");
											</script>
										<?php
									}
								else
								{
									$row=mysql_fetch_array($result);
									$uid=htmlspecialchars($row["uid"]);
									$SQL="SELECT * FROM profil WHERE eid='$eid'";
									$result=mysql_query($SQL);
									$row=mysql_num_rows($result);
									if($row==0)
										$SQL="INSERT INTO profil(eid,uid) VALUES ('$eid','$uid')";
									else
										$SQL="UPDATE profil SET `uid` = '$uid' WHERE `eid`= '$eid'";	
									if(!($result=mysql_query($SQL)))
									{
										?>
											<script>
												alert("PROBLEME BASE DE DONNEE.");
											</script>
										<?php
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
										$message_txt = 'Bonjour,'.$passage_ligne.$passage_ligne.$prenom.' '.$nom.' vient de créer un compte et attend une validation'.$passage_ligne.$passage_ligne.'Merci';
										
										//=====Création de la boundary
										$boundary = "-----=".md5(rand());
										//==========
										 
										//=====Définition du sujet.
										$sujet = '[Création de compte] '.$nom.' '.$prenom;
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
											<div align="center">
												<h1>Félicitations, vous venez de créer votre compte.</h1>
												Veuillez patienter que l'administrateur valide votre inscription.<br>
												Si la validation prend plus de 48h, vous pouvez envoyer un mail à demainleprintemps@gmail.com ou nous appeller au 01 42 81 33 96.
											</div>
											<br><br>
											<center>
												<img type="big" src="/images-site/demain-le-printemps-attestation-2.jpg" alt="Félicitation" width="100%" height="100%">
											</center>
										<?php
									}
								}
							}
							else
							{
								?>
									<div class="">
										Votre compte a déjà été crée. Veuillez patienter que l'administrateur valide votre inscription.<br>
										Vous pouvez envoyer un mail à demainleprintemps@gmail.com ou nous appeller au 01 42 81 33 96.
									</div>
								<?php
							}
						}
					else // S'il existe en plusieurs, alors on doit lui demander quel etudiant il est. 
						{
							?>
								Quel étudiant êtes vous ?
							<?php
							while($row=mysql_fetch_array($result)) // On va recuperer l'eid, qui est unique pour chaque etudiant.
							{
								$eid=htmlspecialchars($row['eid']);
								$photo=htmlspecialchars($row['photo']);
								$secondname=htmlspecialchars($row['nom']);
								$firstname=htmlspecialchars($row['prenom']);
								?>	<br/>
									<img src="/uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps" width="200px" height="200px">
									<a href="creer-compte-multiple.php?eid=<?php echo $eid;?>&amp;nom=<?php echo $nom;?>&amp;prenom=<?php echo $prenom;?>&amp;email=<?php echo $email;?>&amp;login=<?php echo $login;?>&amp;mdp=<?php echo $mdp;?>"><?php echo $secondname; echo $firstname; ?></a>
								<?php
							}
						}
					
				}
			else if($type=="Professeur ou Membre")
				{
					$SQL="SELECT * FROM collectif WHERE prenom='$prenom' && nom='$nom'";
					$result=mysql_query($SQL);
					$row=mysql_fetch_array($result);
					$i=mysql_num_rows($result);
					if(!$result || $i==0)
						{
							?>
								<div class="">
									Vous n'êtes pas un Professeur ou membre. 
									S'il y a une erreur, veuillez contacter l'administrateur afin qu'il vous identifie.<br>
									Merci.
								</div>
							<?php
						}
					else if($i==1) // On verifie si l'etudiant n'existe pas en multiple. Si non, alors on peut directement l'inserer dans la base de données d'utilisateurs.
						{
							$cid=htmlspecialchars($row["cid"]);
							
							$SQL3="SELECT * FROM utilisateurs WHERE cid='$cid'";
							$result3=mysql_query($SQL3);
							if(!$result3||mysql_num_rows($result3)==0) // On verifie si cette personne n'a pas déjà créer un compte.
							{
								$SQL1="INSERT INTO utilisateurs(eid,cid,nom,prenom,email,login,mdp,valider) VALUES ('0','$cid','$nom','$prenom','$email','$login','$password','0')";
								$result1 = mysql_query($SQL1);
								if(!$result1)
									{
										?>
											<script>
												alert("PROBLEME BASE DE DONNEE.");
											</script>
										<?php
									}
								else
								{
									$row=mysql_fetch_array($result);
									$uid=htmlspecialchars($row["uid"]);
									$SQL="SELECT * FROM profil WHERE eid='$eid'";
									$result=mysql_query($SQL);
									$row=mysql_num_rows($result);
									if($row==0)
										$SQL="INSERT INTO profil(cid,uid) VALUES ('$cid','$uid')";
									else
										$SQL="UPDATE profil SET `uid` = '$uid' WHERE `cid`= '$cid'";	
									if(!($result=mysql_query($SQL)))
									{
										?>
											<script>
												alert("PROBLEME BASE DE DONNEE.");
											</script>
										<?php
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
										$message_txt = 'Bonjour,'.$passage_ligne.$passage_ligne.$prenom.' '.$nom.' vient de créer un compte et attend une validation'.$passage_ligne.$passage_ligne.'Merci';
										
										//=====Création de la boundary
										$boundary = "-----=".md5(rand());
										//==========
										 
										//=====Définition du sujet.
										$sujet = '[Création de compte] '.$nom.' '.$prenom;
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
											<div align="center">
												<h1>Félicitations, vous venez de créer votre compte.</h1>
												Veuillez patienter que l'administrateur valide votre inscription.<br>
												Si la validation prends plus de 48h, vous pouvez envoyer un mail à demainleprintemps@gmail.com ou nous appeller au 01 42 81 33 96.
											</div>
											<br><br>
											<center>
												<img type="big" src="/images-site/demain-le-printemps-attestation-2.jpg" alt="Félicitation" width="100%" height="100%">
											</center>
										<?php
									}
								}
							}
							else
							{
								?>
									<div class="">
										Votre compte a déjà été crée. Veuillez patienter que l'administrateur valide votre inscription.<br>
										Vous pouvez envoyer un mail à demainleprintemps@gmail.com ou nous appeller au 01 42 81 33 96.
									</div>
								<?php
							}
						}
				}
		}
		else
		{
			?>
			<div class="">
				Vous n'avez pas saisie le même mot de passe. Veuillez réessayer.
			</div>
			
			<?php
			include("form-creer-compte.php");
		}

	}
	else
	{
		?>
		<div class="">
			Ce Login existe déjà, veuillez réessayer. 
		</div>
		<?php
	}
}
?>

	<br>
	<center>
		<a href="index.php">Retourner à l'accueil</a> 
	</center>
	</h2>
	<?php
mysql_close($conn);

?>
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
