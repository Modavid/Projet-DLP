<!DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-form.css" rel="stylesheet" media="all" type="text/css">
		
		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
		<link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />
	</head>
	
<body>
	<?php
	include(dirname(__FILE__)."/header.php");
	
	include("db_config.php");

	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	
if(isset($_POST['nom']) && ($_POST['prenom']) && ($_POST['type'])) 
{
	$nom=mysql_real_escape_string($_POST['nom']);
	$prenom=mysql_real_escape_string($_POST['prenom']);
	$type=mysql_real_escape_string($_POST['type']);
	
	
			if($type=="Actuel étudiant" || $type=="Ancien étudiant" )
			{
			// On verifie si cette utilisateur est un etudiant de dlp
			$SQL5="SELECT * FROM etudiants WHERE nom='$nom' and prenom='$prenom' ORDER BY eid DESC";
			$result5=mysql_query($SQL5);
			$student=mysql_fetch_array($result5);
		
				if(!$result5 || mysql_num_rows($result5)==0)
				{	?>
					<div class="">
					Vous n'êtes pas un étudiant. 
					S'il y a une erreur, veuillez contacter l'administrateur afin qu'il vous identifie.<br>
					Merci.
					</div>
					<?php
				}	
				else{ //c'est un étudiant
				
				$eid=htmlspecialchars($student["eid"]);
				$SQL3="SELECT * FROM utilisateurs WHERE eid='$eid'";
				$result3=mysql_query($SQL3);
					if(!$result3||mysql_num_rows($result3)==0) // On verifie si cette personne n'a pas déjà créer un compte.
					{
					$SQLph="SELECT * FROM etudiants WHERE eid='$eid'";
					$resultph=mysql_query($SQLph);
					$rowph=mysql_fetch_array($resultph);
					$nomph=htmlspecialchars($rowph['nom']);
					$prenomph=htmlspecialchars($rowph['prenom']);
					$photoph=htmlspecialchars($rowph['photo']);
					$sqlcurs="SELECT type FROM cursus WHERE eid='$eid'";
					$rescurs=mysql_query($sqlcurs);
					$rowcurs=mysql_fetch_array($rescurs);
					$type=htmlspecialchars($rowcurs['type']);
						?>
						
			<section class="conteneur-superieur">	
				<div class="conteneur">
					<h1>Créer un compte</h1>
		
					<div class="conteneur-formulaire">
						<form method="post" action="nouveau-compte.php" class="formulaire">
							
								<?php
								if(!$photoph||!file_exists("uploaded/" . $photoph))
								$photo = "Pas-de-photo.jpg";
								?>
								<!-- nom  prenom-->
								
									<h1 align="center">
									<?php
										echo ucwords(strtolower(html_entity_decode($nomph))).' '.html_entity_decode($prenomph);
									?>
									</h1>
									
								<!-- photo-->
						
										<img type="photo" src="uploaded/<?php echo $photoph ;?>" width="140" height="180" alt="photo-demain-le-primtemps" >
														
							
								<!-- Info -->
								<br><br>
							
							
									<section class="ligne" style="padding-left: 50px;padding-top: 30px" width="300px">
										<span class="titre-ligne">Email</span>
										<input type="text" name="mail"required>
									</section>
								<br>
									<section class="ligne" style="padding-left: 50px;padding-top: 30px" width="300px">
										<span class="titre-ligne">login</span>
										<input type="text" name="login"required>
									</section>
								<br>
									<section class="ligne" style="padding-left: 50px;padding-top: 30px" width="300px">
										<span class="titre-ligne">Mot de passe</span>
										<input type="text" name="mdp"required>
									</section>
								<br>	
									<section class="ligne" style="padding-left: 50px;padding-top: 30px" width="300px">
										<span class="titre-ligne">Confirmer mot de passe</span>
										<input type="text" name="cmdp"required>
									</section>
								<br>
									<section class="ligne"  style="padding-left: 50px;padding-top: 30px" width="300px">
										<span class="titre-ligne">Mot de réconnaissance</span>
										<input type="text" name="mdr"required>
									</section>
								<br><br>	
									<section class="ligne" >
									<input type="hidden" name="nomph" value="<?php
										echo ($nomph) ?>" >
								</section>
							
								<section class="ligne" >
								<input type="hidden" name="prenomph" value="<?php
										echo ($prenomph) ?>"  >
								</section>
								
								<section class="ligne" >
								<input type="hidden" name="type" value="<?php
										echo ($type) ?>"  >
								</section>
								<section class="ligne" >
								<input type="hidden" name="id" value="<?php
										echo ($eid) ?>"  >
								</section>
							
						
						
								<input type="submit" value="Envoyer" >
								
								<p>
						
								
							</form>
						</div>
						</div>
						</section>
							
						<?php
						
						
					}else
					{
						?>
						<div class="">
							<h1>Votre compte a déjà été crée. Veuillez patienter que l'administrateur valide votre inscription.<br>
							Vous pouvez envoyer un mail à demainleprintemps@gmail.com ou nous appeller au 01 42 81 33 96.</h1>
						</div>
						<?php
					
					}
			}
				
				
				
	
			
		}else if($type="Membre de l'equipe")	
		{
		// On verifie s'il appartient a l'equipe de dlp
		$SQL6="SELECT * FROM collectif WHERE nom='$nom' && (prenom='$prenom' || prenom LIKE '$prenom %')";
		$result6=mysql_query($SQL6);
		$peda=mysql_fetch_array($result6);
		
			if(!$result6 || mysql_num_rows($result6)==0)
			{	?>
					<div class="">
					Vous n'êtes pas un membre de l'equipe de DLP. 
					S'il y a une erreur, veuillez contacter l'administrateur afin qu'il vous identifie.<br>
					Merci.
					</div>
					<?php
			}	
			else{ //c'est un membre
				
				$cid=htmlspecialchars($peda["cid"]);
				$SQL4="SELECT * FROM utilisateurs WHERE cid='$cid'";
				$result4=mysql_query($SQL4);
				if(!$result4||mysql_num_rows($result4)==0) // On verifie si cette personne n'a pas déjà créer un compte.
					{
					$SQLph="SELECT * FROM collectif WHERE cid='$cid'";
					$resultph=mysql_query($SQLph);
					$rowph=mysql_fetch_array($resultph);
					$nomph=htmlspecialchars($rowph['nom']);
					$prenomph=htmlspecialchars($rowph['prenom']);
					$photoph=htmlspecialchars($rowph['photo']);
					$type=htmlspecialchars($rowph['type']);
						?>
						
						<section class="conteneur-superieur">	
						<div class="conteneur">
							<h1>Créer un compte</h1>
		
							<div class="conteneur-formulaire">
								<form method="post" action="nouveau-compte.php" class="formulaire">
							
								<?php
									if(!$photoph||!file_exists("uploaded/" . $photoph))
									$photo = "Pas-de-photo.jpg";
								?>
								<!-- nom  prenom-->
								
								<h1 align="center">
									<?php
									echo ucwords(strtolower(html_entity_decode($nomph))).' '.html_entity_decode($prenomph);
									?>
								</h1>
								
								<!-- photo-->
						
									<img type="photo" src="uploaded/<?php echo $photoph ;?>" width="140" height="180" alt="photo-demain-le-primtemps" >
														
							
								<!-- Info -->
								<br><br>
							
							
								<section class="ligne" style="padding-left: 50px;padding-top: 30px" width="300px">
									<span class="titre-ligne">Email</span>
									<input type="text" name="mail"required>
								</section>
								<br>
								<section class="ligne" style="padding-left: 50px;padding-top: 30px" width="300px">
									<span class="titre-ligne">login</span>
									<input type="text" name="login"required>
								</section>
								<br>
								<section class="ligne" style="padding-left: 50px;padding-top: 30px" width="300px">
									<span class="titre-ligne">Mot de passe</span>
									<input type="text" name="mdp"required>
								</section>
								<br>	
								<section class="ligne" style="padding-left: 50px;padding-top: 30px" width="300px">
									<span class="titre-ligne">Confirmer mot de passe</span>
									<input type="text" name="cmdp"required>
								</section>
								<br>
								<section class="ligne"  style="padding-left: 50px;padding-top: 30px" width="300px">
									<span class="titre-ligne">Mot de réconnaissance</span>
									<input type="text" name="mdr"required>
								</section>
								<br><br>	
								<section class="ligne" >
								<input type="hidden" name="nomph" value="<?php
									echo ($nomph) ?>" >
								</section>
							
								<section class="ligne" >
								<input type="hidden" name="prenomph" value="<?php
									echo ($prenomph) ?>"  >
								</section>
							
								<section class="ligne" >
								<input type="hidden" name="type" value="<?php
									echo ($type) ?>"  >
								</section>
								<section class="ligne" >
								<input type="hidden" name="id" value="<?php
									echo ($cid) ?>"  >
								</section>
							
						
						
								<input type="submit" value="Envoyer" >
								
								<p>
						
								
								</form>
							</div>
						</div>
						</section>
							
						<?php
						
						
					}else
					{
						?>
						<div class="">
							<h1>Votre compte a déjà été crée. Veuillez patienter que l'administrateur valide votre inscription.<br>
							Vous pouvez envoyer un mail à demainleprintemps@gmail.com ou nous appeller au 01 42 81 33 96.</h1>
						</div>
						<?php
					}
				
		
			
			}
		}

	
}
		
	
//include("form-creer-compte.php");
	


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