<?php




$host_name  = "db479117358.db.1and1.com";
$database   = "db479117358";
$user_name  = "dbo479117358";
$password   = "4444fab";

$base = $_REQUEST["image"];
$nam = $_REQUEST["name"];
$Login=$_POST["Login"];

// on cherche la personne dont le login est "$Login" et on remplace le nom de la photo par celui generer aleatoirement







if (isset($base)&&isset($nam)) {
 
$suffix = createRandomID();
$image_name = "img_".$suffix."_".date("Y-m-d-H-m-s").".jpg";
 
// base64 encoded utf-8 string
$binary = base64_decode($base);
 
// binary, utf-8 bytes
 
header("Content-Type: bitmap; charset=utf-8");
 
$file = fopen("../uploaded/" . $image_name, "wb");
 
$connect = mysqli_connect($host_name, $user_name, $password, $database); 
$Modifierphoto ="UPDATE utilisateurs SET photo= '$image_name' WHERE login='$Login'";
$result = mysqli_query($connect, $Modifierphoto);



fwrite($file, $binary);
 
fclose($file);
 
die($image_name);
 
} else {
 
die("No POST");
}
 
function createRandomID() {
 
$chars = "abcdefghijkmnopqrstuvwxyz0123456789?";
//srand((double) microtime() * 1000000);
 
$i = 0;
 
$pass = "";
 
while ($i <= 5) {
 
$num = rand() % 33;
 
$tmp = substr($chars, $num, 1);
 
$pass = $pass . $tmp;
 





$i++;
}




  

return $pass;
}


?>