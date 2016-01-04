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
		<link href="style/style-form.css" rel="stylesheet" media="all" type="text/css">
		
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
		<br><br>
<?php
include('auth.php');
include('db_config.php');

	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	
	if(!isset($_SESSION['AUTH']))
	{
		?>
			<script>
				alert('ACCES NON AUTORISE');
			</script>
		<?php
	}
	else if($_SESSION['AUTH']==1)
	{
		if(isset($_POST['uid']) && isset($_POST['valider']) )
		{
			$uid=mysql_real_escape_string($_POST['uid']);
			$valider=mysql_real_escape_string($_POST['valider']);
			if(strcmp($valider,"oui")==0)
			{
				$SQL3="UPDATE utilisateurs SET valider='1' WHERE uid='$uid'";
				$result3=mysql_query($SQL3);
				$row=mysql_fetch_array($result3);
				$SQL="SELECT * FROM utilisateurs WHERE uid='$uid'";
				$result=mysql_query($SQL);
				$row=mysql_fetch_array($result);
				$mail =htmlspecialchars($row['mail']);
				$nom =htmlspecialchars($row['nom']);
				$prenom =htmlspecialchars($row['prenom']);
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
				$message_txt = 'Bonjour '.$prenom.' '.$prenom.','.$passage_ligne.$passage_ligne.'Votre témoignage a été validé ! Vous pouvez dès à présent le voir sur notre site, ';
				$message_txt.='http://www.ecole-theatrale.fr/temoignages-etudiant.php'.$passage_ligne.$passage_ligne.'Merci';
		
				//=====Création de la boundary
				$boundary = "-----=".md5(rand());
				//==========
				 
				//=====Définition du sujet.
				$sujet = '[Témoignage DLP]';
				//=========
		 		
				//=====Création du header de l'e-mail.
				$header = "From: \"DLP\"<demainleprintemps@gmail.com>".$passage_ligne;
				$header.= "Reply-to: \"DLP\" <demainleprintemps@gmail.com>".$passage_ligne;
				$header.= "MIME-Version: 1.0".$passage_ligne;
				$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
				 
				//=====Envoi de l'e-mail.
				mail($mail,$sujet,$message_txt,$header);
			}
			if(strcmp($valider,"non")==0)
			{
				$SQL3="DELETE FROM utilisateurs WHERE uid='$uid'";
				$result3=mysql_query($SQL3);
			}
		}
		if(isset($_POST['tid']))
		{
			$tid=mysql_real_escape_string($_POST['tid']);
			$valider=mysql_real_escape_string($_POST['valider']);
			if(strcmp($valider,"oui")==0)
			{
				$SQL3="UPDATE temoignages SET valider='1' WHERE tid='$tid'";
				$result3=mysql_query($SQL3);
				$SQL="SELECT * FROM temoignages WHERE tid='$tid'";
				$result=mysql_query($SQL);
				$eid=htmlspecialchars($row['eid']);
				$SQL="SELECT * FROM utilisateurs WHERE eid='$eid'";
				$result=mysql_query($SQL);
				$row=mysql_fetch_array($result);
				$mail =htmlspecialchars($row['mail']);
				$nom =htmlspecialchars($row['nom']);
				$prenom =htmlspecialchars($row['prenom']);
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
				$message_txt = 'Bonjour '.$prenom.' '.$prenom.','.$passage_ligne.$passage_ligne.'Votre compte a été validé ! Vous pouvez dès à présent vous connecter sur notre site, ';
				$message_txt.='http://www.ecole-theatrale.fr/connexion.php'.$passage_ligne.$passage_ligne.'Merci';
		
				//=====Création de la boundary
				$boundary = "-----=".md5(rand());
				//==========
				 
				//=====Définition du sujet.
				$sujet = '[Témoignage DLP]';
				//=========
		 		
				//=====Création du header de l'e-mail.
				$header = "From: \"DLP\"<demainleprintemps@gmail.com>".$passage_ligne;
				$header.= "Reply-to: \"DLP\" <demainleprintemps@gmail.com>".$passage_ligne;
				$header.= "MIME-Version: 1.0".$passage_ligne;
				$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
				 
				//=====Envoi de l'e-mail.
				mail($mail,$sujet,$message_txt,$header);
			}
			if(strcmp($valider,"non")==0)
			{
				$SQL3="DELETE FROM temoignages WHERE tid='$tid'";
				$result3=mysql_query($SQL3);
			}
		}
		/*if(isset($_POST['eid']) && isset($_POST['valid']) )
			{
				$eid=mysql_real_escape_string($_POST['eid']);
				$valid=mysql_real_escape_string($_POST['valid']);
				if(strcmp($valid,"oui")==0)
				{
					$SQL4="UPDATE etudiants SET valider='0' WHERE eid='$eid'";
					$result4=mysql_query($SQL4);
				}
				if(strcmp($valid,"non")==0)
				{
					$SQL4="UPDATE etudiants SET valider='0' , facebook_id='0' , photofacebook='' , pseudofacebook='' WHERE eid='$eid'";
					$result4=mysql_query($SQL4);
				}
			}*/
		$SQL="SELECT * FROM utilisateurs WHERE valider='0'";
		$result=mysql_query($SQL);
		if(!$result||mysql_num_rows($result)==0)
		{
			?>
				<h2 align="center">
					Aucun compte utilisateur pour étudiants à ajouter.
				</h2>
			<?php
		}
		else
		{
			while($row=mysql_fetch_array($result))
			{
				$nom=htmlspecialchars($row['nom']);
				$prenom=htmlspecialchars($row['prenom']);
				$eid=htmlspecialchars($row['eid']);
				$cid=htmlspecialchars($row['cid']);
				$uid=htmlspecialchars($row['uid']);
				
				if($eid!=0)
				{
					$SQL1="SELECT * FROM etudiants WHERE eid='$eid'";
					$result1=mysql_query($SQL1);
					$row1=mysql_fetch_array($result1);
					$photo=htmlspecialchars($row1['photo']);
					$email=htmlspecialchars($row1['email']);
				}
				else if($cid!=0)
				{
					$SQL1="SELECT * FROM collectif WHERE cid='$cid'";
					$result1=mysql_query($SQL1);
					$row1=mysql_fetch_array($result1);
					$photo=htmlspecialchars($row1['photo']);
				}
				?>
					<table style="margin: auto;">
						<tr>
							<!-- photo -->
							<td>
								<img type="eleve" src="/uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps">
							</td>
							<!-- nom et prenom -->
							<td>
								<h2><?php echo ucwords(strtolower(html_entity_decode($nom))).' '.html_entity_decode($prenom).' souhaiterait créer un compte';?></h2>
							</td>
						</tr>
					</table>
					<table style="margin: auto;">
						<tr>
							<td>
								<p class="texte-ligne"><?php echo nl2br($email);?></p>
							</td>
						</tr>
					</table>
					<form method="POST" action="gerer-inscription.php" class="formulaire">
							
						 <input type="hidden" name="uid" value="<?php echo $uid;?>"> 
						 
						<span class="titre-ligne">Valider :</span>
						<p class="texte-ligne">
							Oui <input type="radio" name="valider" value="oui">
							Non <input type="radio" name="valider" value="non">
						</p>
							
						<input type="submit" value="Envoyer">
						
					</form>
				<?php
			}
		
		}
		$SQL="SELECT * FROM temoignages WHERE valider!='1'";
		$result=mysql_query($SQL);
		if(!$result||mysql_num_rows($result)==0)
		{
			?>
				<h2 align="center">
					Aucun témoignages à ajouter.
				</h2>
			<?php
		}
		else
		{
			while($row=mysql_fetch_array($result))
			{
				$eid=htmlspecialchars($row['eid']);
				$tid=htmlspecialchars($row['tid']);
				$titre=htmlspecialchars($row['titre']);
				$com=htmlspecialchars($row['com']);
				$valider=htmlspecialchars($row['valider']);
				
				if($eid!=0)
				{
					$SQL1="SELECT * FROM etudiants WHERE eid='$eid'";
					$result1=mysql_query($SQL1);
					$row1=mysql_fetch_array($result1);
					$photo=htmlspecialchars($row1['photo']);
					$nom=htmlspecialchars($row1['nom']);
					$prenom=htmlspecialchars($row1['prenom']);
				}
				?>
					<table style="margin: auto;">
						<tr>
							<!-- photo -->
							<td>
								<img type="eleve" src="/uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps">
							</td>
							<!-- nom et prenom -->
							<?php
							if ($valider == 0)
							{
								?>
								<td>
									<h2><?php echo ucwords(strtolower(html_entity_decode($nom))).' '.html_entity_decode($prenom).' souhaiterait témoigner';?></h2>
								</td>
								<?php
							}
							else
							{
								?>
								<td>
									<h2><?php echo ucwords(strtolower(html_entity_decode($nom))).' '.html_entity_decode($prenom).' souhaiterait modifier son témoignage';?></h2>
								</td>
								<?php
							}
							?>
						</tr>
					</table>
					<table style="margin: auto;">
						<tr>
							<td style="padding-left: 50px">
								<p class="texte-ligne"><?php echo 'TITRE : '.html_entity_decode($titre);?></p>
								<p class="texte-ligne"><?php echo 'TEXTE : '.nl2br($com);?></p>
							</td>
						</tr>
					</table>
					<form method="POST" action="gerer-inscription.php" class="formulaire">
							
						 <input type="hidden" name="tid" value="<?php echo $tid;?>"> 
						 
						<span class="titre-ligne">Valider :</span>
						<p class="texte-ligne">
							Oui <input type="radio" name="valider" value="oui">
							Non <input type="radio" name="valider" value="non">
						</p>
							
						<input type="submit" value="Envoyer">
						
					</form>
				<?php
			}
		
		}
	}
		/*
				<p>
					Compte liée via facebook
				</p>-->
		<?php
		$SQL2="SELECT * FROM etudiants WHERE valider='1'";
		$SQL3="SELECT * FROM collectif WHERE valider='1'";
		$result2=mysql_query($SQL2);
		$result3=mysql_query($SQL3);
		if(!$result2||mysql_num_rows($result2)==0)
		{
			?>
				<p>
					Aucun élève n'est a ajouter.
				</p>
			<?php
		}
		else if(!$result3||mysql_num_rows($result3)==0)
		{
			$nom=htmlspecialchars($row3['nom']);
			$prenom=htmlspecialchars($row3['prenom']);
			$photo=htmlspecialchars($row3['photo']);
			$photofb=htmlspecialchars($row3['photofacebook']);
			$pseudofb=htmlspecialchars($row3['pseudofacebook']);
			$cid=htmlspecialchars($row3['cid']);
			
			?>
				<div id="bloc1">
					<!-- photo -->
					<aside>
						<img src="uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps" width="200px" height="200px">
					</aside>
					
					<!-- nom et prenom -->
					<p>
						<?php echo nl2br($nom,$prenom);?>
					</p>
				</div>
				<div id="bloc2">  
					<!-- photo -->
					<aside>
						<img src="<?php echo $photofb;?>" alt="photo-facebook" width="200px" height="200px"/>
					</aside>
					<!-- pseudo -->
					<p>
						<?php echo nl2br($pseudofb);?>
					</p>
				</div>
				<form method="POST" action="gerer-inscription.php">
					  <input type="hidden" name="eid" value="<?php echo $eid;?>" /> 
					 
					<span>Valider :</span>
					Oui <input type="radio" name="valid" value="oui">
					Non <input type="radio" name="valid" value="non">
					</br>
					<input type="submit" value="Envoyer">
				</form>
				<?php
		}
		else
		{
			while ($row2=mysql_fetch_array($result2))
			{
				$nom=htmlspecialchars($rowé['nom']);
				$prenom=htmlspecialchars($row['prenom']);
				$photo=htmlspecialchars($row['photo']);
				$photofb=htmlspecialchars($row2['photofacebook']);
				$pseudofb=htmlspecialchars($row2['pseudofacebook']);
				$eid=htmlspecialchars($row2['eid']);
			
				?>
				<div id="bloc1">
					<!-- photo -->
					<aside>
						<img src="uploaded/<?php echo $photo ;?>" alt="photo-demain-le-primtemps" width="200px" height="200px">
					</aside>
					
					<!-- nom et prenom -->
					<p>
						<?php echo nl2br($nom,$prenom);?>
					</p>
				</div>
				<div id="bloc2">  
					<!-- photo -->
					<aside>
						<img src="<?php echo $photofb;?>" alt="photo-facebook" width="200px" height="200px"/>
					</aside>
					<!-- pseudo -->
					<p>
						<?php echo nl2br($pseudofb);?>
					</p>
				</div>
				
				<form method="POST" action="gerer-inscription.php">
					  <input type="hidden" name="eid" value="<?php echo $eid;?>" /> 
					 
					<span>Valider :</span>
					Oui <input type="radio" name="valid" value="oui">
					Non <input type="radio" name="valid" value="non">
					</br>
					<input type="submit" value="Envoyer">
				</form>
				<?php
			}
		}*/

?>
<br>
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
