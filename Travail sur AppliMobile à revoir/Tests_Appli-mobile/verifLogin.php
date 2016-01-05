<?php
// Paramètres de connexion à la base de données
$host_name  = "db479117358.db.1and1.com";
$database   = "db479117358";
$user_name  = "dbo479117358";
$password   = "4444fab";

// Variables récupérées depuis le programme Java
$loginPHP = $_POST["loginAppli"];


/***** Test sur l'existence du login dans la base de données *****/

$connect = mysqli_connect($host_name, $user_name, $password, $database) or die("Error " . mysqli_error($connect));
$query_loginExistant = "SELECT login FROM utilisateurs WHERE login = '$loginPHP' ";
$result_loginExistant = mysqli_query($connect, $query_loginExistant);

// Test et affectation du résultat à une variable
while($row = mysqli_fetch_array($result_loginExistant)) {
	$loginBdd = $row["login"];
}

// Test la variable précédemment définie
if($loginBdd == $loginPHP) {
	// Pseudo déjà utilisé
	echo 1;
}
else
	echo 0;

?>