<!DOCTYPE html >
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
        <link href="style/style-form.css" rel="stylesheet" media="all" type="text/css">

        <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {

// fade-effet pour les images			
//				$('.fancybox').animate({
//					opacity:.5
//				
//				
//				});
//				$('.fancybox').hover(function(){
//					$(this).stop().animate({opacity:1});
//				}, function(){
//					$(this).stop().animate({opacity:.5});
//				
//				});
            });
        </script>

    </head>

    <body>
        <?php
        include("db_config.php");

        $conn = mysql_connect($DB_host, $DB_login, $DB_pass);
        $db = mysql_select_db($DB_select, $conn);
        if (!$conn) {
            die('Erreur de connexion: ' . mysql_error());
        }

        $nomph = mysql_real_escape_string($_POST['nomph']);
        $prenomph = mysql_real_escape_string($_POST['prenomph']);
        $email = mysql_real_escape_string($_POST['mail']);
        $login = mysql_real_escape_string($_POST['login']);
        $password = md5(mysql_real_escape_string($_POST['mdp']));
        $cmdp = md5(mysql_real_escape_string($_POST['cmdp']));
        $motdr = mysql_real_escape_string($_POST['mdr']);
        $id = mysql_real_escape_string($_POST['id']);
        $type = mysql_real_escape_string($_POST['type']);



        //$nom=htmlspecialchars($row['nom']);
        //$prenom=htmlspecialchars($row['prenom']);
        // On commence par voir si le login saisie n'existe pas déjà. S'il existe, alors on demande a l'utilisateur de choisir un autre login.
        $SQL2 = "SELECT * FROM utilisateurs WHERE login='$login'";
        $result2 = mysql_query($SQL2);
        if (!$result2 || mysql_num_rows($result2) == 0) {
            // On verifie ensuite si les mots de passes saisie sont identiques. S'il ne le sont pas, alors on demande a l'utilisateur de ressaisir les mots de passes.
            if (strcmp($password, $cmdp) == 0) {
                if ($type == "eleve") {
                    $SQL1 = "INSERT INTO utilisateurs(eid,cid,nom,prenom,email,login,mdp,valider,type) VALUES ('$id','0','$nomph','$prenomph','$email','$login','$password','0','$type')";
                    $result1 = mysql_query($SQL1);

                    if (!$result1) {
                        ?>
                        <script>
                            alert("PROBLEME BASE DE DONNEE.");
                        </script>
                        <?php
                    } else {
                        $SQL3 = "SELECT * FROM utilisateurs WHERE eid='$id'";
                        $result3 = mysql_query($SQL3);
                        $row = mysql_fetch_array($result3);
                        $uid = htmlspecialchars($row["uid"]);
                        $SQL = "SELECT * FROM profil WHERE eid='$id'";
                        $result = mysql_query($SQL);
                        $row = mysql_num_rows($result);
                        if ($row == 0) {
                            $SQL = "INSERT INTO profil(eid,uid) VALUES ('$id','$uid')";
                        } else {
                            $SQL = "UPDATE profil SET `uid` = '$uid' WHERE `eid`= '$id'";
                        }
                        if (!($result = mysql_query($SQL))) {
                            ?>
                            <script>
                                alert("PROBLEME BASE DE DONNEE.");
                            </script>
                            <?php
                        } else {


                            
                            $mail = 'demainleprintemps@gmail.com'; // Déclaration de l'adresse de destination.
                            if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) { // On filtre les serveurs qui rencontrent des bogues.
                                $passage_ligne = "\r\n";
                            } else {
                                $passage_ligne = "\n";
                            }
                            ini_set('SMTP', 'smtp.orange.fr');
                            ini_set("sendmail_from", "demainleprintemps@gmail.com");
                            //=====Déclaration des messages au format texte et au format HTML.
                            $message_txt = 'Bonjour,' . $passage_ligne . $passage_ligne . $prenomph . ' ' . $nomph . ' E-mail: ' . $email . ' Login: ' . $login . ' ' . 'vient de créer un compte ' . $type . ' et attend une validation' . $passage_ligne . 'Mot de réconnaissance saisie : ' . $motdr . $passage_ligne . $passage_ligne . $passage_ligne . 'Merci';

                            //=====Création de la boundary
                            $boundary = "-----=" . md5(rand());
                            //==========
                            //=====Définition du sujet.
                            $sujet = '[Création de compte] ' . $nomph . ' ' . $prenomph;
                            //=========
                            //=====Création du header de l'e-mail.
                            $header = "From: \"DLP\"<demainleprintemps@gmail.com>" . $passage_ligne;
                            $header.= "Reply-to: \"DLP\" <demainleprintemps@gmail.com>" . $passage_ligne;
                            $header.= "MIME-Version: 1.0" . $passage_ligne;
                            $header.= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;

                            //=====Envoi de l'e-mail.
                            mail($mail, $sujet, $message_txt, $header);
                            //==========
                            
                            $mail = $email; // Déclaration de l'adresse de destination.
                                if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) { // On filtre les serveurs qui rencontrent des bogues.
                                    $passage_ligne = "\r\n";
                                } else {
                                    $passage_ligne = "\n";
                                }
                                ini_set('SMTP', 'smtp.orange.fr');
                                ini_set("sendmail_from", "demainleprintemps@gmail.com");
                                //=====Déclaration des messages au format texte et au format HTML.
                                $message_txt = 'F�licitations, vous venez de cr�er un compte sur le site de Demain le printemps.' . $passage_ligne . 'Votre login est: ' . $login . $passage_ligne . 'Tres bientot, le webmaster validera votre compte et vous recevrez un email de confirmation' .$passage_ligne . $passage_ligne . 'Cordialement' . $passage_ligne . 'L\'�quipe de Demain le Printemps';
//Tres bientot, le webmaster validera votre compte et vous recevrez un email de confirmation
                                //=====Création de la boundary
                                $boundary = "-----=" . md5(rand());
                                //==========
                                //=====Définition du sujet.
                                $sujet = '[Création de compte] ' . $nomph . ' ' . $prenomph;
                                //=========
                                //=====Création du header de l'e-mail.
                                $header = "From: \"DLP\"<demainleprintemps@gmail.com>" . $passage_ligne;
                                $header.= "Reply-to: \"DLP\" <demainleprintemps@gmail.com>" . $passage_ligne;
                                $header.= "MIME-Version: 1.0" . $passage_ligne;
                                $header.= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;

                                //=====Envoi de l'e-mail.
                                mail($mail, $sujet, $message_txt, $header);
                            ?>
                            <section class="conteneur-superieur">	
                                <div class="conteneur">
                                    <div class="text-bloc1">
                                        <h1>Félicitations, vous venez de créer votre compte <?php echo $type; ?>.</h1>
                                        <p>L'administrateur doit maintenant valider votre inscription.
                                            Si dans un délai de 24h votre compte n'a pas été activé contactez-nous par mail : demainleprintemps@gmail.com
                                            ou bien par téléphone au : 01 42 81 33 96.</p>
                                        <p>  Pour retourner à l'accueil, <a href="index.php" ><U> cliquer ici</U></a></p>                 
                                        <img type="big" style="margin-left: 200px" src="/images-site/demain-le-printemps-attestation-2.jpg" alt="Félicitation" width="50%" height="50%">

                                    </div>
                                </div>
                            </section>
                            <?php
                        }
                    }
                } else if ($type == "membre") {
                    $SQL1 = "INSERT INTO utilisateurs(eid,cid,nom,prenom,email,login,mdp,valider,type) VALUES ('0','$id','$nomph','$prenomph','$email','$login','$password','0','$type')";
                    $result1 = mysql_query($SQL1);

                    if (!$result1) {
                        ?>
                        <script>
                            alert("PROBLEME BASE DE DONNEE.");
                        </script>
                        <?php
                    } else {
                        $SQL3 = "SELECT * FROM utilisateurs WHERE cid='$id'";
                        $result3 = mysql_query($SQL3);
                        $row = mysql_fetch_array($result3);
                        $uid = htmlspecialchars($row["uid"]);
                        $SQLx = "SELECT * FROM collectif WHERE cid='$id'";
                        $resultx = mysql_query($SQLx);
                        $rowx = mysql_fetch_array($resultx);
                        $details = htmlspecialchars($rowx['details']);
                        $SQL = "SELECT * FROM profil WHERE cid='$id'";
                        $result = mysql_query($SQL);
                        $row = mysql_num_rows($result);
                        if ($row == 0) {
                            $SQL = "INSERT INTO profil(cid,uid,descriptif) VALUES ('$id','$uid','$details')";
                        } else {
                            $SQL = "UPDATE profil SET `uid` = '$uid' WHERE `cid`= '$id'";
                            $SQL2 = "UPDATE profil SET `descriptif` = '$details' WHERE `cid`= '$id'";
                        }
                        if (!($result = mysql_query($SQL) || $result2 = mysql_query($SQL2))) {
                            ?>
                            <script>
                                alert("PROBLEME BASE DE DONNEE.");
                            </script>
                            <?php
                        } else {



                            
                            $mail = 'demainleprintemps@gmail.com'; // Déclaration de l'adresse de destination.
                            if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) { // On filtre les serveurs qui rencontrent des bogues.
                                $passage_ligne = "\r\n";
                            } else {
                                $passage_ligne = "\n";
                            }
                            ini_set('SMTP', 'smtp.orange.fr');
                            ini_set("sendmail_from", "demainleprintemps@gmail.com");
                            //=====Déclaration des messages au format texte et au format HTML.
                            $message_txt = 'Bonjour,' . $passage_ligne . $passage_ligne . $prenomph . ' ' . $nomph . ' vient de créer un compte et attend une validation' . $passage_ligne . 'Mot de réconnaissance saisie : ' . $motdr . $passage_ligne . $passage_ligne . 'Merci';

                            //=====Création de la boundary
                            $boundary = "-----=" . md5(rand());
                            //==========
                            //=====Définition du sujet.
                            $sujet = '[Création de compte] ' . $nomph . ' ' . $prenomph;
                            //=========
                            //=====Création du header de l'e-mail.
                            $header = "From: \"DLP\"<demainleprintemps@gmail.com>" . $passage_ligne;
                            $header.= "Reply-to: \"DLP\" <demainleprintemps@gmail.com>" . $passage_ligne;
                            $header.= "MIME-Version: 1.0" . $passage_ligne;
                            $header.= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;

                            //=====Envoi de l'e-mail.
                            mail($mail, $sujet, $message_txt, $header);
                            //==========
                            
                            $mail = $email; // Déclaration de l'adresse de destination.
                                if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) { // On filtre les serveurs qui rencontrent des bogues.
                                    $passage_ligne = "\r\n";
                                } else {
                                    $passage_ligne = "\n";
                                }
                                ini_set('SMTP', 'smtp.orange.fr');
                                ini_set("sendmail_from", "demainleprintemps@gmail.com");
                                //=====Déclaration des messages au format texte et au format HTML.
                                $message_txt = 'F�licitations, vous venez de cr�er un compte sur le site de Demain le printemps.' . $passage_ligne . 'Votre login est: ' . $login . $passage_ligne . 'Tres bientot, le webmaster validera votre compte et vous recevrez un email de confirmation' .$passage_ligne . $passage_ligne . 'Cordialement' . $passage_ligne . 'L\'�quipe de Demain le Printemps';
//Tres bientot, le webmaster validera votre compte et vous recevrez un email de confirmation
                                //=====Création de la boundary
                                $boundary = "-----=" . md5(rand());
                                //==========
                                //=====Définition du sujet.
                                $sujet = '[Création de compte] ' . $nomph . ' ' . $prenomph;
                                //=========
                                //=====Création du header de l'e-mail.
                                $header = "From: \"DLP\"<demainleprintemps@gmail.com>" . $passage_ligne;
                                $header.= "Reply-to: \"DLP\" <demainleprintemps@gmail.com>" . $passage_ligne;
                                $header.= "MIME-Version: 1.0" . $passage_ligne;
                                $header.= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;

                                //=====Envoi de l'e-mail.
                                mail($mail, $sujet, $message_txt, $header);
                            ?>
                            <section class="conteneur-superieur">	
                                <div class="conteneur">
                                    <div class="text-bloc1">
                                        <h1>Félicitations, vous venez de créer votre compte <?php echo $type; ?>.</h1>
                                        <p>L'administrateur doit maintenant valider votre inscription.
                                            Si dans un délai de 24h votre compte n'a pas été activé contactez-nous par mail : demainleprintemps@gmail.com
                                            ou bien par téléphone au : 01 42 81 33 96.</p>
                                        <p>  Pour retourner à l'accueil, <a href="index.php" ><U> cliquer ici</U></a></p>                 
                                        <img type="big" style="margin-left: 200px" src="/images-site/demain-le-printemps-attestation-2.jpg" alt="Félicitation" width="50%" height="50%">
                                    </div>
                                </div>
                            </section>
                            <?php
                        }
                    }
                }
                if ($type == "fan" || $type == "candidat") {
                    $photo = basename($_FILES["myfile"]["name"]);
                    $erreurup = "";


                    $uploadOk = 1;
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
                    if (isset($_POST["submit"])) {
                        $check = getimagesize($_FILES["myfile"]["tmp_name"]);
                        if ($check !== false) {

                            $uploadOk = 1;
                        } else {
                            $erreurup = "ce n'est pas une image.";
                            $uploadOk = 0;
                        }
                    }



// Check file size
                    if ($_FILES["myfile"]["size"] > 500000) {
                        $erreurup = "il est trop volumineux. ";
                        $uploadOk = 0;
                    }

// Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        ?>
                        <script>
                            alert("Votre fichier n'a pas ete upload� car, <?php echo $erreurup; ?>");
                        </script>
                        <meta http-equiv="Refresh" content="0;url=http://www.ecole-theatrale.fr/creer-compte-<?php echo $type; ?>.php">
                        <?php
// if everything is ok, try to upload file
                    } else {
                        $SQL1 = "INSERT INTO utilisateurs(eid,cid,nom,prenom,email,login,mdp,valider,type,photo) VALUES ('0','$id','$nomph','$prenomph','$email','$login','$password','1','$type','$photo')";
                        $result1 = mysql_query($SQL1);
                        $target_dir = "uploaded/" . $type . "s/";
                        $target_file = $target_dir . $_FILES["myfile"]["name"];
                        if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
                            
                        } else {
                            ?>
                            <script>
                                alert("Votre fichier n'a pas ete upload�");
                            </script>
                            <meta http-equiv="Refresh" content="0;url=http://www.ecole-theatrale.fr/creer-compte-<?php echo $type; ?>.php">
                            <?php
                        }

                        if (!$result1) {
                            ?>
                            <script>
                                alert("PROBLEME BASE DE DONNEE.");
                            </script>
                            <meta http-equiv="Refresh" content="0;url=http://www.ecole-theatrale.fr/creer-compte-<?php echo $type; ?>.php">
                            <?php
                        } else {
                            $SQL2 = "SELECT * FROM utilisateurs WHERE login='$login'";
                            $result2 = mysql_query($SQL2);
                            $row = mysql_fetch_array($result2);
                            $uid = htmlspecialchars($row["uid"]);
                            $SQL3 = "SELECT * FROM utilisateurs WHERE uid='$uid'";
                            $result3 = mysql_query($SQL3);
                            $row = mysql_fetch_array($result3);
                            $uid = htmlspecialchars($row["uid"]);
                            $SQL = "SELECT * FROM profil WHERE uid='$uid'";
                            $result = mysql_query($SQL);
                            $row = mysql_num_rows($result);
                            if ($row == 0) {
                                $SQL = "INSERT INTO profil(cid,uid,photo) VALUES ('0','$uid','$photo')";
                            } else {
                                $SQL = "INSERT INTO profil(cid,uid,photo) VALUES ('0','$uid','$photo')";
                            }
                            if (!($result = mysql_query($SQL))) {
                                ?>
                                <script>
                                    alert("PROBLEME BASE DE DONNEE.");
                                </script>
                                <meta http-equiv="Refresh" content="0;url=http://www.ecole-theatrale.fr/creer-compte-<?php echo $type; ?>.php">
                                <?php
                            } else {



                                
                                $mail = 'demainleprintemps@gmail.com'; // Déclaration de l'adresse de destination.
                                if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) { // On filtre les serveurs qui rencontrent des bogues.
                                    $passage_ligne = "\r\n";
                                } else {
                                    $passage_ligne = "\n";
                                }
                                ini_set('SMTP', 'smtp.orange.fr');
                                ini_set("sendmail_from", "demainleprintemps@gmail.com");
                                //=====Déclaration des messages au format texte et au format HTML.
                                $message_txt = 'Bonjour,' . $passage_ligne . $passage_ligne . $prenomph . ' ' . $nomph . ' vient de créer un compte ' . $type . '.' . $passage_ligne . 'Nom: ' . $nomph . $passage_ligne . 'Pr�nom: ' . $prenomph . $passage_ligne . 'Login: ' . $login . $passage_ligne . 'E-mail: ' . $email . $passage_ligne . $passage_ligne . 'Bonne r�ception' . $passage_ligne . 'Le webmaster';


                                //=====Création de la boundary
                                $boundary = "-----=" . md5(rand());
                                //==========
                                //=====Définition du sujet.
                                $sujet = '[Création de compte] ' . $nomph . ' ' . $prenomph;
                                //=========
                                //=====Création du header de l'e-mail.
                                $header = "From: \"DLP\"<demainleprintemps@gmail.com>" . $passage_ligne;
                                $header.= "Reply-to: \"DLP\" <demainleprintemps@gmail.com>" . $passage_ligne;
                                $header.= "MIME-Version: 1.0" . $passage_ligne;
                                $header.= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;

                                //=====Envoi de l'e-mail.
                                mail($mail, $sujet, $message_txt, $header);

                                $mail = $email; // Déclaration de l'adresse de destination.
                                if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) { // On filtre les serveurs qui rencontrent des bogues.
                                    $passage_ligne = "\r\n";
                                } else {
                                    $passage_ligne = "\n";
                                }
                                ini_set('SMTP', 'smtp.orange.fr');
                                ini_set("sendmail_from", "demainleprintemps@gmail.com");
                                //=====Déclaration des messages au format texte et au format HTML.
                                $message_txt = 'F�licitations, vous venez de cr�er un compte sur le site de Demain le printemps.' . $passage_ligne . 'Votre login est: ' . $login . $passage_ligne . 'En attendant la cr�ation de l\'application andro�d vous pouvez d�j� vous connecter sur le site et g�rer votre profil en cliquant sur ce lien :' . $passage_ligne . '  http://www.ecole-theatrale.fr/connexion.php' . $passage_ligne . $passage_ligne . 'Cordialement' . $passage_ligne . 'L\'�quipe de Demain le Printemps';
//Tres bientot, le webmaster validera votre compte et vous recevrez un email de confirmation
                                //=====Création de la boundary
                                $boundary = "-----=" . md5(rand());
                                //==========
                                //=====Définition du sujet.
                                $sujet = '[Création de compte] ' . $nomph . ' ' . $prenomph;
                                //=========
                                //=====Création du header de l'e-mail.
                                $header = "From: \"DLP\"<demainleprintemps@gmail.com>" . $passage_ligne;
                                $header.= "Reply-to: \"DLP\" <demainleprintemps@gmail.com>" . $passage_ligne;
                                $header.= "MIME-Version: 1.0" . $passage_ligne;
                                $header.= "Content-Type: multipart/alternative;" . $passage_ligne . " boundary=\"$boundary\"" . $passage_ligne;

                                //=====Envoi de l'e-mail.
                                mail($mail, $sujet, $message_txt, $header);
                                //==========
                                ?>
                                <section class="conteneur-superieur">	
                                    <div class="conteneur">
                                        <div class="text-bloc1">
                                            <h1>Félicitations, vous venez de créer votre compte <?php echo $type; ?> (un email vient de vous être envoyé sur votre adresse).</h1>
                                            <p>Trés bientôt l'application Android de DLP sera téléchargeable. Vous aurez à ce moment le plaisir d'interagir pleinement avec la communauté.
                                                En attendant, vous pourrez déjà modifier votre profil en vous connectant au site.</p>
                                            <p>  Pour retourner à l'accueil, <a href="index.php" ><U> cliquer ici</U></a></p>                 
                                            <img type="big" style="margin-left: 200px" src="/images-site/demain-le-printemps-attestation-2.jpg" alt="Félicitation" width="50%" height="50%">
                                        </div>
                                        <?php
                                    }
                                }
                            }
                        }
                    } else {
                        ?>
                        <script>
                            alert("Vous n'avez pas saisie le même mot de passe. Veuillez réessayer.");
                        </script>
                        <meta http-equiv="Refresh" content="0;url=http://www.ecole-theatrale.fr/form-creer-compte.php">


                        <?php
                        //include("form-creer-compte.php");
                    }
                } else {
                    ?>
                    <script>
                        alert("Ce Login existe déjà, veuillez réessayer.");
                    </script>
                    <meta http-equiv="Refresh" content="0;url=http://www.ecole-theatrale.fr/form-creer-compte.php">
    <?php
}
?>
            </div> 
            <!-- Fin div conteneur -->	
                <?php
                include(dirname(__FILE__) . "/barre-laterale.php");
                ?>
            <!--Fin section conteneur-superieur-->
        </section>   

            <?php
            mysql_close($conn);
            ?>

        <?php
        include(dirname(__FILE__) . "/footer.php");
        ?>

    </body>
</html>
