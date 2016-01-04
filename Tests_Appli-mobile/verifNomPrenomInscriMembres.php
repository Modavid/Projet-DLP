<?php
// Paramètres de connexion à la base de données
$host_name  = "db479117358.db.1and1.com";
$database   = "db479117358";
$user_name  = "dbo479117358";
$password   = "4444fab";

// Variables récupérées depuis le programme Java
$nom = $_POST["nomAppli"];
$prenom = $_POST["prenomAppli"];


/***** Test sur le nom et le prénom *****/

// Connexion à la base de données et exécution de la requête
$connect = mysqli_connect($host_name, $user_name, $password, $database); //or die("Error " . mysqli_error($connect));
$query = "SELECT nom, prenom FROM etudiants WHERE nom = '$nom' AND prenom = '$prenom' " or die("Error in the consult.." . mysqli_error($connect));
$result = mysqli_query($connect, $query);		// OU : $result = $connect->query($query);

// Test sur le résultat de la requête n'est pas vide
if(mysqli_num_rows($result) != 0) {
	// Nom et Prénom présents dans la bdd et donc valides
	echo 1;
}
else
	echo 0;

?>