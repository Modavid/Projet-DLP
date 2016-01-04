<?php
// Paramètres de connexion à la base de données

$host_name  = "db479117358.db.1and1.com";
$database   = "db479117358";
$user_name  = "dbo479117358";
$password   = "4444fab";


// Variables récupérées depuis le programme Java

$motSecretPHP = $_POST["motSecret"];
$mdpPerduPHP = md5($_POST["mdpPerdu"]);


$connect = mysqli_connect($host_name, $user_name, $password, $database) or die("Error " . mysqli_error($connect));
$query = "SELECT motSecret FROM utilisateurs WHERE motSecret = '$motSecretPHP' " or die("Error in the consult.." . mysqli_error($connect));
$result = mysqli_query($connect, $query);		// OU : $result = $connect->query($query);

if (mysqli_num_rows($result) > 0) { 
	echo 1;

	//or die("Error " . mysqli_error($connect));
	$modifierMdp = "UPDATE utilisateurs  SET mdp = '$mdpPerduPHP' WHERE motSecret = '$motSecretPHP' ";
	$result = mysqli_query($connect, $modifierMdp);
}
else {
	echo 0;
}

?>



