<?php
// Paramètres de connexion à la base de données
$host_name  = "db479117358.db.1and1.com";
$database   = "db479117358";
$user_name  = "dbo479117358";
$password   = "4444fab";

// Récupère les variables depuis le code Java
$nom = ucfirst($_POST["nomAppli"]);	// ucfirst() passe le premier caractère en majuscule
$prenom = ucfirst($_POST["prenomAppli"]);
$login = $_POST["loginAppli"];
$mdp = md5($_POST["mdpAppli"]);
$email = $_POST["emailAppli"];
$tel = $_POST["telAppli"];
$motSecret = $_POST["motSecretAppli"];
$type = $_POST["typeAppli"];
$mdpEnClair = $_POST["mdpAppli"];


/***** Insertion de l'utilisateur dans la base de données *****/

$connect = mysqli_connect($host_name, $user_name, $password, $database) or die("Error " . mysqli_error($connect));
$query = "INSERT INTO utilisateurs (nom, prenom, login, mdp, email, tel, motSecret, type) VALUES ('$nom', '$prenom', '$login','$mdp', '$email', '$tel', '$motSecret', '$type')" or die("Error in the consult.." . mysqli_error($connect));
$result = mysqli_query($connect, $query);   // OU : $result = $connect->query($query);

?>


<?php

/***** Envoi d'un email à l'administrateur *****/

$sujet = "Inscription d'un Membre";
$message = "Bonjour, nous vous informons de l'inscription de $prenom $nom sur l'application Demain le Printemps en tant que $type.";
$destinataire = 'edd94@hotmail.fr';
$headers = "From: \"Ecole theatrale russe Demain le Printemps\"<eduardo.joao.mosca@gmail.com>\n";
$headers .= "Reply-To:eduardo.joao.mosca@gmail.com\n";
$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";

if (mail($destinataire,$sujet,$message,$headers)) {
	echo "L'email a bien ete envoye.";
}
else {
	echo "Une erreur s'est produite lors de l'envoi de l'email.";
}

?>


<?php

/***** Envoi d'un email à l'utilisateur *****/

$sujet = "Confirmation d'inscription sur l'application Demain le Printemps";
$message = "Bonjour $prenom $nom, nous vous confirmons votre inscription sur l'application Demain le Printemps.
Login : $login
Mot de passe : $mdpEnClair
Mot secret : \"$motSecret\"

A bientot !";
$destinataire = "$email";
$headers = "From: \"Ecole theatrale russe Demain le Printemps\"<eduardo.joao.mosca@gmail.com>\n";
$headers .= "Reply-To:eduardo.joao.mosca@gmail.com\n";
$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";
if (mail($destinataire,$sujet,$message,$headers)) {
	echo "L'email a bien ete envoye.";
}
else {
	echo "Une erreur s'est produite lors de l'envoi de l'email.";
}

?>

