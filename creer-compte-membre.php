<!DOCTYPE html >

<?php ini_set('display_errors','off'); ?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-form.css" rel="stylesheet" media="all" type="text/css">
		
		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
		<link rel="icon" type="image/png" href="/Image/images-design/mafavicon-1.ico" />
	</head>
	
<body>


	<?php
include(dirname(__FILE__)."/header.php");
include('db_config.php');

	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	
	if(isset($_GET['cid']) )
	{
		$cid=$_GET['cid'];
		
		$SQL="SELECT * FROM membre WHERE cid='$cid'";
		$result=mysql_query($SQL);

				
		if(!$result || mysql_num_rows($result)==0)
				{	?>
						
					<section class="conteneur-superieur">	
				         <div class="conteneur">
						<div class="text-bloc1">
					<h1>Vous n'étes pas un membre. </h2>
					<p> S'il y a une erreur, veuillez contacter l'administrateur afin qu'il vous identifie.</p>
					<p>Merci.</p>
					<p>  Pour retourner à l'accueil, <a href="index.php" ><U> cliquer ici</U></a></p>
					</div>
					</div>
					</section>
					<?php
				}	
				else{ //c'est un étudiant
				
				
                                echo "Voici l'id: ".$cid;
				$SQL3="SELECT * FROM utilisateurs WHERE cid='$cid'";
				$result3=mysql_query($SQL3);
					if(!$result3||mysql_num_rows($result3)==0) // On verifie si cette personne n'a pas déjâ créer un compte.
					{
					$SQLph="SELECT * FROM membre WHERE cid='$cid'";
					$resultph=mysql_query($SQLph);
					$rowph=mysql_fetch_array($resultph);
					$nomph=htmlspecialchars($rowph['nom']);
					$prenomph=htmlspecialchars($rowph['prenom']);
					$photoph=htmlspecialchars($rowph['photo']);
					
					
						?>
						
			<section class="conteneur-superieur">	
				<div class="conteneur">
					<h1>Créer un compte</h1>
                                        <?php $url=$_POST['url'];
                                            echo $url; 
                                            ?>
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
								
						             <div id="paragraphe-image">
			                         <div class="text-bloc2">
						                <p style="border: 1px dashed #ffffff; margin-left:60px; margin-right:60px"><b>En remplissant ce formulaire <br> je reconnais être bien <br>la personne sur la photo.</b></p>	
										 </div>  
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
										<span class="titre-ligne">Mot de reconnaissance</span>
										<input type="text" name="mdr"required>
									</section> <br>
									<input type="submit" value="Envoyer" >
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
								<input type="hidden" name="type" value="membre"  >
								</section>
								<section class="ligne" >
								<input type="hidden" name="id" value="<?php
										echo ($cid) ?>"  >
								</section>
							
						
						
								
								
								<p>
						
								
							</form>
						</div>
						</div>
						</section>
							
						<?php
						
						
					}else
					{
						?>
						<section class="conteneur-superieur">	
				         <div class="conteneur">
						<div class="text-bloc1">
							<h1>Votre compte a déjâ été crée.</h1> 
							<p>Si vous rencontrez un problème de connection contactez-nous par mail : demainleprintemps@gmail.com
                              ou bien par téléphone au : 01 42 81 33 96.<br><br>
					        Pour retourner à l'accueil, <a href="index.php" ><U> cliquer ici</U></a></p>
						</div>
						
						<?php
					
					}
			}
				
				
				
	
			
		}
						
		

	

		
	
//include("form-creer-compte.php");
	


?>

	
	 
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