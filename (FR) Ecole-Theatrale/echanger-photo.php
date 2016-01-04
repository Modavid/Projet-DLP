	<!DOCTYPE html >
<html>
	<?php

		include("auth.php");
		include("db_config.php");
		$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
		if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
		$db = mysql_select_db($DB_select, $conn);
		if(isset($_GET['eid']) && isset($_SESSION['AUTH']) == 1)//ADMIN
		{
			$eid =mysql_real_escape_string($_GET['eid']);
			$phactuelle=mysql_real_escape_string($_GEt['photo']);
			/*$SQL="SELECT * FROM etudiants WHERE eid = '$eid'";
			$result=mysql_query($SQL);
			$row=mysql_fetch_array($result);
			$phactuelle=htmlspecialchars($row["photo"]);*/
			

							
			$SQL2="SELECT * FROM photo WHERE eid = '$eid'";
			$result2=mysql_query($SQL2);
			$row2=mysql_fetch_array($result2);
			$phancienne=htmlspecialchars($row2["nomph"]);
			$phid=htmlspecialchars($row2["phid"]);
			
			$SQL3="UPDATE photo SET nomph='$phactuelle' WHERE phid='$phid'";
			$result3=mysql_query($SQL1);
		
			
			$SQL1="UPDATE profil SET photo='$phancienne' WHERE eid = '$eid'";
			$result1=mysql_query($SQL1);
			$SQL10="UPDATE etudiants SET photo='$phancienne' WHERE eid='$eid'";
			$result10 = mysql_query($SQL10);
			$SQL="UPDATE utilisateurs SET photo='$phancienne' WHERE eid='$eid'";
			$result = mysql_query($SQL);
		}
	
		mysql_close($conn);
	?>
  <meta http-equiv="refresh" content="0;URL=http://www.ecole-theatrale.fr/afficher-profil-eleve.php?eid=<?php echo $eid?>">
</html>
						