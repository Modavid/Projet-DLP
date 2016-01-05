<?php

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

if ((isset($_GET["action"])))
		 {
		  switch ($_GET["action"])
		    {
		    case ("updateSession") :api_updateSession($_GET["var"]);
		      break;
		    case ("createSession") :api_createSession();
		      break;
		    case ("deleteSession") :api_deleteSession();
		      break;
		    case ("Authentification") :api_Authentification();
		      break;
		    case ("existValidSession") :api_existValidSession();
		      break;
		    case ("getName") :api_getName();
		       break;
			default:
		      print("L'action appelée n'existe pas.");  
			}
		  }
else 
  print("Erreur lors de l'utilisation de l'API ");


function gen_uuid() {  // Fonction de création d'un UUID aléatoire
	 $uuid = array(
	  'time_low'  => 0,
	  'time_mid'  => 0,
	  'time_hi'  => 0,
	  'clock_seq_hi' => 0,
	  'clock_seq_low' => 0,
	  'node'   => array()
	 );

 $uuid['time_low'] = mt_rand(0, 0xffff) + (mt_rand(0, 0xffff) << 16);
 $uuid['time_mid'] = mt_rand(0, 0xffff);
 $uuid['time_hi'] = (4 << 12) | (mt_rand(0, 0x1000));
 $uuid['clock_seq_hi'] = (1 << 7) | (mt_rand(0, 128));
 $uuid['clock_seq_low'] = mt_rand(0, 255);

 for ($i = 0; $i < 6; $i++) {
  $uuid['node'][$i] = mt_rand(0, 255);
 }

 $uuid = sprintf('%08x-%04x-%04x-%02x%02x-%02x%02x%02x%02x%02x%02x',
  $uuid['time_low'], $uuid['time_mid'], $uuid['time_hi'],
  $uuid['clock_seq_hi'], $uuid['clock_seq_low'],$uuid['node'][0],
  $uuid['node'][1], $uuid['node'][2],$uuid['node'][3],
  $uuid['node'][4],$uuid['node'][5]
 );

 return $uuid;
}//-------------------------------------------------------

function api_createSession($uid)
	{
		include("db_config.php");
		mysql_set_charset ('UTF8');

		$date=date("Y-m-d H:i:s"); //Date Actuel
		$UUID=gen_uuid(); // génération UUID
		$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
		$db = mysql_select_db($DB_select, $conn);

		if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
		$SQL="INSERT INTO session(UUID,dateSession,uid) VALUES ('$UUID', '$date',$uid)";
		$reponse=mysql_query($SQL);
		return $UUID;
}

function api_updateSession($var)
	{
		include("db_config.php");
		mysql_set_charset ('UTF8');
		$date=date("Y-m-d H:i:s"); 
		$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
		$db = mysql_select_db($DB_select, $conn);

		if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
		$SQL="UPDATE session SET dateSession='$date' WHERE UUID='$var'";
		$reponse=mysql_query($SQL);
}

function api_deleteSession(){
		include("db_config.php");
		mysql_set_charset ('UTF8');
		$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
		$db = mysql_select_db($DB_select, $conn);
		$postdata = file_get_contents("php://input");	//Récupération de l'UUID envoyé en POST
		$data = json_decode($postdata);
		$UUID =$data->UUID;

		if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
		$SQL="DELETE FROM session WHERE UUID='$UUID'";
		$reponse=mysql_query($SQL);
		print('0');
}

function api_existValidSession(){
		include("db_config.php");
		mysql_set_charset ('UTF8');

		$postdata = file_get_contents("php://input");	//Récupération de l'UUID envoyé en POST
		$data = json_decode($postdata);
		$UUID =$data->UUID;
		$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
		$db = mysql_select_db($DB_select, $conn);

		if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
		$SQL="Select dateSession as date From session where UUID='$UUID'";
		$reponse=mysql_query($SQL);

		$date=mysql_fetch_assoc($reponse);

		if($date['date']==''){ // Session inexistante
			print('0');
		}else{	
			if($date['date']<date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s")." - 1 hours"))){// session expirer
				print('0'); 
			}else{				// Session existante et a jours
				//api_updateSession($UUID); // Mise a jour date
				print('1'); 
			}
		}
}


function api_Authentification(){
	include("db_config.php");
	mysql_set_charset ('UTF8');

	$postdata = file_get_contents("php://input");
	$data = json_decode($postdata);

	//Protection contre les insertion SQL (non fonctionnel)
	//$username = mysqli::real_escape_string($data->username);
	//$password = MD5(mysqli::real_escape_string($data->password));

	$username =$data->username;
	$password = MD5($data->password);
			
	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);

	//Recherche de l'UID de l'utilateur : 
	$SQL2="Select uid From utilisateurs where login='$username' and mdp='$password' ";
	$reponse2=mysql_query($SQL2);
		if (!$reponse2){
	    $message  = 'Requête invalide : ' . mysql_error() . "\n";
	    $message .= 'Requête complète : ' . $SQL2;
	    die($message);
		}
	$donnee = mysql_fetch_assoc($reponse2);

	if($donnee['uid']){
		$UUIDSession = api_createSession($donnee['uid']);
		print($UUIDSession);
	}else{
			print('0');
		}
}

function api_getName(){

	include("db_config.php");
	mysql_set_charset ('UTF8');
	//Recupération des donnée envoyé en POST :
	$postdata = file_get_contents("php://input");
	$data = json_decode($postdata);
	$UUID = $data->UUID;

	$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
	$db = mysql_select_db($DB_select, $conn);

	if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
	$SQL="Select prenom From utilisateurs, session where UUID='$UUID' and utilisateurs.uid=session.uid";
	$reponse=mysql_query($SQL);
	$donnee = mysql_fetch_array($reponse);

	print($donnee['prenom']);
}

?>
