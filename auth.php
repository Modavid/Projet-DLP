<?php
	
	session_start();
	include("db_config.php");
	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	$db = mysql_select_db($DB_select, $conn);
	
	if(!isset($_SESSION['AUTH']))
	{
		if(!isset($_POST['login'])||!isset($_POST['mdp']))
		{
			
		}
		else
		{
			$login=mysql_real_escape_string($_POST['login']);
			$mdp=md5(mysql_real_escape_string($_POST['mdp']));
	
			// On va récupérer le cid ou l'eid
			$SQL1="SELECT * FROM utilisateurs WHERE (login='$login' || email='$login') && mdp='$mdp' && valider='1'";
			$resultat1=mysql_query($SQL1);
		
			if(!$resultat1||mysql_num_rows($resultat1)==0)
			{
				?>
					<script type="text/javascript">alert('Les informations saisies sont fausses, veuillez retourner a la page precedente. Sinon votre inscription est encore en cours de traitement.');</script>
				<meta http-equiv="Refresh" content="0;url=http://www.ecole-theatrale.fr/connexion.php">
				<?php
				exit;
			}
			else
			{
				$row1=mysql_fetch_array($resultat1);
				$eid=htmlspecialchars($row1['eid']);
				$cid=htmlspecialchars($row1['cid']);
                                $uid=htmlspecialchars($row1['uid']);
				$type=htmlspecialchars($row1['type']);
                                
				
				if(strcmp($type, "admin") != 0)
				{
					$SQL3="SELECT * FROM collectif WHERE cid='$cid'";
					$resultat3=mysql_query($SQL3);

					if(!$resultat3||mysql_num_rows($resultat3)==0)
					{
						$SQL4="SELECT * FROM etudiants WHERE eid='$eid'";
						$resultat4=mysql_query($SQL4);
									
						if(!$resultat4||mysql_num_rows($resultat4)==0)
						{
                                                    $SQL5="SELECT * FROM utilisateurs WHERE uid='$uid' AND type IN ('fan','candidat','stagiaire')";
                                                    $resultat5=mysql_query($SQL5);
                                                        if(!$resultat5||mysql_num_rows($resultat5)==0)
                                                        {
							?><p> Un problème inattendu a été rencontré, veuillez prendre contact avec l'administrateur du site</p><?php
                                                        }
                                                        else 
                                                        {
                                                        $row5=mysql_fetch_array($resultat5);
							$_SESSION['AUTH']=4;
							$_SESSION['FACEBOOK']=0;
							$_SESSION['USERID']=$row5['uid'];
                                                        }
                                                        ?>
								<meta http-equiv="Refresh" content="0;url=http://www.ecole-theatrale.fr/index.php">
							<?php
                                                        exit;
                                                        
                                                        
						}
						else
						{
							$row4=mysql_fetch_array($resultat4);
							$_SESSION['AUTH']=3;
							$_SESSION['FACEBOOK']=0;
							$_SESSION['USERID']=$row4['eid'];
							//echo $_SESSION['USERID'];
							//Je suis un etudiants
							?>
								<meta http-equiv="Refresh" content="0;url=http://www.ecole-theatrale.fr/index.php">
							<?php
							exit;
						}
					}
					else
					{
						$row3=mysql_fetch_array($resultat3);
						$_SESSION['AUTH']=2;
						$_SESSION['USERID']=$row3['cid'];
						//Je suis membre de l'assoc'
						?>
							<meta http-equiv="Refresh" content="0;url=http://www.ecole-theatrale.fr/index.php">
						<?php
						exit;
					}
				}
				else
				{
					$SQL7="SELECT * FROM utilisateurs WHERE (login='$login' || email='$login') && mdp='$mdp' && valider='1'";
					$resultat7=mysql_query($SQL7);
					$row7=mysql_fetch_array($resultat7);
					$cid=htmlspecialchars($row7['cid']);
					$eid=htmlspecialchars($row7['eid']);
					if ($eid == 0){
					$_SESSION['AUTH']=1;
					$_SESSION['USERID']=$cid;
					$_SESSION['uid']=$row7['uid'];
					
					
					}
					else 
					{$_SESSION['AUTH']=1;
					$_SESSION['USERID']=$eid;
					$_SESSION['uid']=$row7['uid'];
				
					}
					//Je suis un admin
					?>
						<meta http-equiv="Refresh" content="0;url=http://www.ecole-theatrale.fr/index.php">
					<?php
					exit;
				}	
			}
			mysql_close($conn);
		}//ici
	}
	else
	{
		
	}
?>