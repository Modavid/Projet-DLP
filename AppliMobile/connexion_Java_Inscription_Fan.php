<?php
//conection:
$host_name  = "db479117358.db.1and1.com";
$database   = "db479117358";
$user_name  = "dbo479117358";
$password   = "4444fab";

// Récupère les variables depuis le code Java
$username1 = $_POST["username1"];
$mdp1=md5($_POST["mdp1"]);
$prenom1 = $_POST["prenom1"];
$login1 = $_POST["login1"];
$email1 = $_POST["email1"];
$FC=$_POST["FC"];


$connect = mysqli_connect($host_name, $user_name, $password, $database); //or die("Error " . mysqli_error($connect));

/***** Test sur l'existence du login dans la base de données *****/

$query_loginExistant = "SELECT login FROM profil WHERE login = '$login1' ";
$result_loginExistant = mysqli_query($connect, $query_loginExistant);

// Test et affectation du résultat à la variable loginBdd
while($row = mysqli_fetch_array($result_loginExistant)) {
  $loginBdd = $row["login"];
}

// Affichage test : echo "loginbdd = $loginbdd<br>";

// Test la variable précédemment définie
if($loginBdd == $login1){
   // Pseudo déjà utilisé
   echo "Ce pseudo est déjà utilisé";   // Un echo c'est bien mais affecter une variable (par ex loginDejaExistant) à 1 c'est pas mal aussi :)
}

/***** Fin du test *****/
else{

$query = "INSERT INTO utilisateurs (nom,prenom,email,login,mdp,type) VALUES ('$username1','$prenom1','$email1','$login1','$mdp1','$FC')" or die("Error in the consult.." . mysqli_error($connect));
$result = mysqli_query($connect, $query);   // OU : $result = $connect->query($query);

while($row = mysqli_fetch_array($result)) {
  echo $row["nom"] . "<br>";
}

echo " '$user' user<br>";


echo " '$query' requete<br>";

echo " '$SQL2' requete<br>";

}
?>



<?php
//Configuration de l'envoie de mail pour le gerant du site//
$sujet = "Inscription d'un Fan";
$message = "Bonjour,nous vous informons de l'Inscription du fan $username1 ";
$destinataire = 'steven-haddad.2@hotmail.fr';
$headers = "From: \"expediteur ecole théatrale\"<soirerpaname@hotmail.fr>\n";
$headers .= "Reply-To:soirerpaname@hotmail.fr\n";
$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";
if(mail($destinataire,$sujet,$message,$headers))
{
        echo "L'email a bien été envoyé.";
}
else
{
        echo "Une erreur c'est produite lors de l'envois de l'email.";
}
?>



<?php
//Configuration de l'inscription pour le fan ou candidat//
$sujet = "Confirmation Inscription";
$message = "Bonjour MR $username1, nous vous confirmons votre inscription sur l'application  dlp_ecole_theatrale";
$destinataire = "$email1";
$headers = "From: \"expediteur ecole théatrale\"<steven-haddad.2@hotmail.fr>\n";
$headers .= "Reply-To:steven-haddad.2@hotmail.fr\n";
$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";
if(mail($destinataire,$sujet,$message,$headers))
{
        echo "L'email a bien été envoyé.";
}
else
{
        echo "Une erreur s'est produite lors de l'envois de l'email.";
}
?>

