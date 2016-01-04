
	<?php
		include("auth.php");
		include("db_config.php");
		$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
		if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
		$db = mysql_select_db($DB_select, $conn);
		if(isset($_GET['eid']) && isset($_SESSION['AUTH']) == 1)//ADMIN
		{
			$eid =mysql_real_escape_string($_GET['eid']);
			$photo=mysql_real_escape_string($_POST['photo1']);
			$SQL="UPDATE profil SET photo1='' WHERE eid = '$eid'";
			$result=mysql_query($SQL);
		
		
		
		}
		
		
		mysql_close($conn);
	?>	
		
		
		
		
		
