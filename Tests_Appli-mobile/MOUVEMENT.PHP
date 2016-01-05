<?php
//conection:
$host_name  = "localhost";
$database   = "u518667010_aerop";
$user_name  = "u518667010_aeop";
$password   = "thuglife94";

// Récupère les variables depuis le code Java
$idmvmts = $_POST["idmvmts"];


$connect = mysqli_connect($host_name, $user_name, $password, $database); //or die("Error " . mysqli_error($connect));

/***** Test sur l'existence du login dans la base de données *****/



$query = "INSERT INTO retard (raison) VALUES ('jean')" or die("Error in the consult.." . mysqli_error($connect));
$result = mysqli_query($connect, $query);   // OU : $result = $connect->query($qujeanddssdsds