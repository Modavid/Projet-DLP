<?php 
		header("Access-Control-Allow-Origin: *");              

	if ((isset($_GET["action"]))&&(isset($_GET["var"])))
	 {
	  switch ($_GET["action"])
	    {
	    case ("get") :api_get($_GET["var"]);
	      break;
		default:
	      print("L'action appelée n'existe pas.");  
		}
	  }
	else 
	  print("Erreur lors de l'utilisation de l'API ");

	function utf8_encode_all($dat) // -- It returns $dat encoded to UTF8 
	{ 
	  if (is_string($dat)) return utf8_encode($dat); 
	  if (!is_array($dat)) return $dat; 
	  $ret = array(); 
	  foreach($dat as $i=>$d) $ret[$i] = utf8_encode_all($d); 
	  return $ret; 
	} 
	function api_get($var)
	{
		if( $var=="list")  
		{
			include("db_config.php");
			mysql_set_charset ('UTF8');
			$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
			$db = mysql_select_db($DB_select, $conn);

			if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
			$SQL="SELECT * FROM actualite";
			$reponse=mysql_query($SQL);

			//$bdd = new PDO('mysql:host=localhost;dbname=demainp', 'root', '');	
			//$reponse = $bdd->query("Select * From actualite");

			$dbResult_utf8 = array();

			while ($donnees = mysql_fetch_array($reponse)) 
			{
				   $donnees = cleanLigne($donnees);
		           $ligneUtf8 = utf8_encode_all($donnees);
				   array_push($dbResult_utf8 , $ligneUtf8);
		     } 
		     print(json_encode($dbResult_utf8));
 		}
 		else
 		{
 			include("db_config.php");
 			mysql_set_charset ('UTF8');
			$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
			$db = mysql_select_db($DB_select, $conn);

			if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
			$SQL="Select * From actualite where aid=$var";
			$reponse=mysql_query($SQL);

 			//$bdd = new PDO('mysql:host=localhost;dbname=demainp', 'root', '');	
			//$reponse = $bdd->query("Select * From actualite where aid=$var");
			 $dbResult_utf8 = array();
			  
			while ($donnees = mysql_fetch_array($reponse))
			{
					$donnees = cleanLigne($donnees);
		           $ligneUtf8 = utf8_encode_all($donnees);
						array_push($dbResult_utf8 , $ligneUtf8);
		     } 
			 								 
		     print(json_encode($dbResult_utf8));
 		}
	}

		function cleanLigne($donnees){
		$newArray =  array();
		foreach ($donnees as $key => $value) {
			if(!is_numeric($key)){
				$newArray[$key] = $value;
			}
		}
		
		return $newArray;
	}
	
?>