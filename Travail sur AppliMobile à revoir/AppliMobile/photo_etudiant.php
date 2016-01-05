<?php
//conection:
$host_name  = "db479117358.db.1and1.com";
$database   = "db479117358";
$user_name  = "dbo479117358";
$password   = "4444fab";


// Récupère les variables depuis le code Java

$nom = $_POST["nomAppli"];
$prenom = $_POST["prenomAppli"];


// Requête

$connect = mysqli_connect($host_name, $user_name, $password, $database) or die("Error " . mysqli_error($connect));
$query_photo = "SELECT photo FROM etudiants WHERE nom = '$nom' AND prenom = '$prenom' ";
$result_photo = mysqli_query($connect, $query_photo);

while($row = mysqli_fetch_array($result_photo)) {
echo $row["photo"];
}


?>