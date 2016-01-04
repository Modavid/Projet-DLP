<?php
// Paramètres de connexion à la base de données
$host_name  = "db479117358.db.1and1.com";
$database   = "db479117358";
$user_name  = "dbo479117358";
$password   = "4444fab";

// Variables récupérées depuis le programme Java
$loginPHP = $_POST["login"];
$mdpPHP = md5($_POST["mdp"]);


/***** Test sur les identifiants de connexion *****/

// Connexion à la base de données et exécution de la requête
$connect = mysqli_connect($host_name, $user_name, $password, $database); //or die("Error " . mysqli_error($connect));
$query = "SELECT nom FROM utilisateurs WHERE login = '$loginPHP' AND mdp = '$mdpPHP' AND valider = 1" or die("Error in the consult.." . mysqli_error($connect));
$result = mysqli_query($connect, $query);		// OU : $result = $connect->query($query);


// Test sur le résultat de la requête n'est pas vide
if(mysqli_num_rows($result) != 0){
	/*while($row = mysqli_fetch_array($result)) {
		//echo "Resultat : ";
		echo $row["nom"];
	}*/
	echo 1;
}
else
	echo 0;


/****************** Fin du test *******************/


/***** Test sur l'existence du login dans la base de données *****/
/*
$query_loginExistant = "SELECT login FROM utilisateurs WHERE login = '$loginPHP' ";
$result_loginExistant = mysqli_query($connect, $query_loginExistant);

// Test et affectation du résultat à une variable
while($row = mysqli_fetch_array($result_loginExistant)) {
	$loginBdd = $row["login"];
}

echo "<br>loginBdd = $loginBdd<br>";

// Test la variable précédemment définie
if($loginBdd == $loginPHP){
   // Pseudo déjà utilisé
   echo "Ce pseudo est déjà utilisé";
}
*/

/************************** Fin du test **************************/

?>