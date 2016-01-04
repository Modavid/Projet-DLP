<?php
// Paramètres de connexion à la base de données
$host_name  = "localhost";
$database   = "aeroplan94_w2zq";
$user_name  = "aeroplan94_w2zq";
$password   = "thuglife94";
// Variables récupérées depuis le programme Java
$adressesMailVisiteur = $_POST["adressesMailVisiteur"];
$reclammationVisiteurs =$_POST["reclammationVisiteurs"]);
$prenomVisiteurs = $_POST["prenomVisiteurs"];
$idVisiteurs =$_POST["idVisiteurs"]);
 	

/***** Envoi d'un email à l'administrateur *****/

$sujet = "Reclammation de mr '$idVisiteurs','$prenomVisiteurs' ";
$message = "Bonjour, $reclammationVisiteurs.";
$destinataire = '$adressesMailVisiteur';
$headers = "From: \"Ecole theatrale russe Demain le Printemps\"<steven-haddad.2@hotmail.fr>\n";
$headers .= "Reply-To:steven-haddad.2@hotmail.fr\n";
$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";

if (mail($destinataire,$sujet,$message,$headers)) {
	echo "L'email a bien ete envoye.";
}
else {
	echo "Une erreur s'est produite lors de l'envoi de l'email.";
}

?>


