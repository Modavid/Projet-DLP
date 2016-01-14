<!DOCTYPE html >
<html>
	<head>
        <title>Masterclass - Comment s'inscrire</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		<link href="style/style-inscription.css" rel="stylesheet" media="all" type="text/css">
        <link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />
	</head>
	
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	
	<?php
		include(dirname(__FILE__)."/header.php");
                include("db_config.php");
        mysql_set_charset('UTF8');
        $conn = mysql_connect($DB_host, $DB_login, $DB_pass);
        $db = mysql_select_db($DB_select, $conn);
        if (!$conn) {
            die('Connection error: ' . mysql_error());
        }

       
            $cpid = 13;
            $SQL1 = "SELECT * FROM contenupage WHERE cpid='$cpid'";
            $SQL2 = "SHOW columns from contenupage ";
            $result = mysql_query($SQL1);
            $result2 = mysql_query($SQL2);

            $length = mysql_num_rows($result2);

            // 18
            $lengthtotalphoto = $length - 2; //16
            $lengthdiv = $lengthtotalphoto / 4; // 4

            $lengthtotalnophoto = $lengthtotalphoto - $lengthdiv; // 12
            if (!$result || mysql_num_rows($result) == 0) {
                ?>
                <script>
                    alert('DATABASE PROBLEM..');
                </script>
                <?php
            } else {
                $row = mysql_fetch_array($result);


                $nom = htmlspecialchars($row['nom']);

                $titres = array();
                $soustitres = array();
                $textes = array();
                $photos = array();
                for ($i = 1; $i < $lengthdiv + 1; $i++) {
                    array_push($titres, "titre$i");
                    array_push($soustitres, "soustitre$i");
                    array_push($textes, "texte$i");
                    array_push($photos, "photo$i");
                }


                $contents = array();
                for ($i = 0; $i < $lengthdiv; $i++) {

                    array_push($contents, $titres[$i]);
                    array_push($contents, $soustitres[$i]);
                    array_push($contents, $textes[$i]);
                    array_push($contents, $photos[$i]);
                }



                $cpt = 0;
                $contenupage = array();
                for ($i = 0; $i < $lengthtotalphoto; $i++) {

                    $contenupage[$i] = ($row[$contents[$i]]);
                   
                }
           
                ?>

                <section class="conteneur-superieur">
                    <div class="conteneur" style="overflow: auto">
                                           <?php
                        if ($_SESSION['AUTH'] == 1 || $_SESSION['AUTH'] == 2) {//ADMIN ou PROF
                            ?>
                            <div class="bloc-edit">

                                <a href="form-modifier-content.php?cpid=<?php echo $cpid ?>">
                                    <b type="profil">Modifier</b>
                                </a>
                  
                            </div>
                            <?php
                        }
                    }
                
                ?>
                         <div class="text-bloc1">

                            <?php
                    $cpt = 0;
                    for ($i = 0; $i < $lengthtotalphoto; $i++) {
                        if ($cpt == 0) {
                            ?>
                            <h1> <?php echo ($contenupage[$i]) ?> </h1>
                            <?php
                            $cpt++;
                        } else if ($cpt == 1) {
                            ?>
                            <h2> <?php echo ($contenupage[$i]) ?> </h2>
                            <?php
                            $cpt++;
                        } else if ($cpt == 2) {
                            ?>
                            <p> <?php echo ($contenupage[$i]) ?> </p>
                            <?php
                            $cpt++;
                         
                        } else if ($cpt == 3 && !empty($contenupage[$i])) 
                        {
                            ?> <!-- l'id de chaques photos sera photo1, photo2, photo3 etc... -->
                            <div class="bloc-image">
                            <img id="<?php echo $contents[$i] ?>" type="photo" style=" max-width: 400px" src="images-site/<?php echo $contenupage[$i] ?>"  />
                            </div>
                            <?php 
                            
                            $cpt = 0;
                        } else { $cpt = 0;}
                    }
                    ?>
                         </div>
		<!--Fin div conteneur-->
		</div> 
		
		<?php
			include(dirname(__FILE__)."/barre-laterale.php");
		?>
	<!--Fin section conteneur-superieur-->
	</section>

	<?php
		include(dirname(__FILE__)."/footer.php");
	?>
</body>
</html>
