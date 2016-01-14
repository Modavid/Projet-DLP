<!DOCTYPE html >
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		
		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
		<link rel="icon" type="image/png" href="/Image/images-design/mafavicon-1.ico" />
	</head>
	
<body>
	<?php
	include(dirname(__FILE__)."/header.php");
	?>
<section class="conteneur-superieur">	
	<div class="conteneur">
<?php 

	
	
	if( isset($_POST['fb_id']) && isset($_POST['fb_image']) && isset($_POST['fb_name'])) 
	{
		$uid=mysql_real_escape_string($_POST['fb_id']);
		$image=mysql_real_escape_string($_POST['fb_image']);
		$name=mysql_real_escape_string($_POST['fb_name']);
	}
	// echo "ICI:".$uid;
	

	include("db_config.php");
	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	
	$SQL="SELECT * FROM etudiants WHERE facebook_id='$uid'";
	$result=mysql_query($SQL);
	
	if(!$result||mysql_num_rows($result)==0)
		{
			$SQL1="SELECT * FROM collectif WHERE facebook_id='$uid'";
			$result1=mysql_query($SQL1);
			
			if(!$result1||mysql_num_rows($result1)==0)
			{
			
				?> 	
					Votre compte facebook n'est pas liée a notre site web. Veuillez remplir le formulaire ci-dessous et patientez que l'administrateur valide votre inscription via facebook.
					
					
					<form method="post" action="lier-compte-facebook.php" >   
					<table>
					<tbody>
						<tr><td><span>Nom</span></td>
						<td><input type="text" name="nom"required></td></tr>
						
						<tr><td><span>Prenom</span></td>
						<td><input type="text" name="prenom"required></td></tr>
						</tbody>
						</table>
						<br/>
						
						<span> Vous etes (ou avez été) ? </span>
							<SELECT name="type" size="1">
								<OPTION>etudiant
								<OPTION>professeur
								<OPTION>membre
							</SELECT>
						
						<br/>
						<br/>
						
						<input type="hidden" name="fb_id" value=<?php echo $uid;?> />
						<input type="hidden" name="fb_name" value=<?php echo $name;?> />
						<input type="hidden" name="fb_image" value=<?php echo $image;?> />
						
						<input type="submit" value="Envoyer">   
					</form>
					
					
					
				<?php
				
			}
			else
			{
				if($uid==10204192419194783)
				{
				session_start();
				$row1=mysql_fetch_array($result1);
				$_SESSION["AUTH"]=1;
				$_SESSION['USERID']=$row1['cid'];
				//echo $_SESSION['USERID'];
				header('Location: index.php');
				exit;
				}
				session_start();
				$row1=mysql_fetch_array($result1);
				$_SESSION["AUTH"]=2;
				$_SESSION['USERID']=$row1['cid'];
				//echo $_SESSION['USERID'];
				header('Location: index.php');
				exit;
			}
			
		}
	else
		{
					
					session_start();
					$row=mysql_fetch_array($result);
					$picture=htmlspecialchars($row['photofacebook']);
					echo "anciennephoto".$picture;
					?></br><?php
					echo "nouvellephoto".$image;
					$test=strcmp ($image ,$picture);
					?></br><?php echo $test;
					if(strcmp ($image ,$picture)!=0)
					{
						$SQL2="UPDATE etudiants SET photofacebook='$image' WHERE facebook_id='$uid'";
						$result2=mysql_query($SQL2);
						if(!$result2)
							{
								echo "erreur de modification photo facebook";
							}
						else
							{
								echo"Votre photo à été changé ";
							}
					}
					
					$_SESSION['AUTH']=3;
					$_SESSION['USERID']=$row['eid'];
					$_SESSION['FACEBOOK']=1;
					//echo $_SESSION['USERID'];
					header('Location: index.php');
					exit;
				
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
