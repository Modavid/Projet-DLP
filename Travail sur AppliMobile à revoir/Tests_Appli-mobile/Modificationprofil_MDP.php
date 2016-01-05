<?php
$host_name  = "db479117358.db.1and1.com";
$database   = "db479117358";
$user_name  = "dbo479117358";
$password   = "4444fab";

// Récupère les variables depuis le code Java

$mdpsAmodifPHP=md5($_POST["mdpsAmodif"]);
$LoginPHPAMODIF = $_POST["loginAMODIF"];
$mdpsModifierPHP = md5($_POST["mdpsModifier"]);



        
$connect = mysqli_connect($host_name, $user_name, $password, $database); //or die("Error " . mysqli_error($connect));
$VerifMdp = "SELECT mdp FROM utilisateurs WHERE mdp = '$mdpsAmodifPHP' " or die("Error in the consult.." . mysqli_error($connect));
$result = mysqli_query($connect, $VerifMdp);
		// OU : $result = $connect->query($query);




if (mysqli_num_rows($result) > 0)	
{ 
echo 1;
//If modif==0 soit egale a mdp

$connect = mysqli_connect($host_name, $user_name, $password, $database); //or die("Error " . mysqli_error($connect));


$ModifierMdp ="UPDATE utilisateurs  SET mdp= '$mdpsModifierPHP' WHERE login='$LoginPHPAMODIF'";
$result = mysqli_query($connect, $ModifierMdp);


}

else{

echo 0;


}



?>