<?php
$host_name  = "db479117358.db.1and1.com";
$database   = "db479117358";
$user_name  = "dbo479117358";
$password   = "4444fab";

// Récupère les variables depuis le code Java
$nvxLoginsPHP=($_POST["nvxLogins"]);
$LoginPHPAMODIF = $_POST["loginAMODIF"];





        
$connect = mysqli_connect($host_name, $user_name, $password, $database); //or die("Error " . mysqli_error($connect));
$ModifierLogin="UPDATE utilisateurs  SET login = '$nvxLoginsPHP' WHERE login='$LoginPHPAMODIF'";
$result = mysqli_query($connect, $ModifierLogin);		// OU : $result = $connect->query($query);


?>