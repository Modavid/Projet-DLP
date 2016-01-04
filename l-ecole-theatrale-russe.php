<!DOCTYPE html >
<html>
	<head>
        <title>L'École Théatrale Russe</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<!--[if lt IE 9]>
		    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">
		
        <!-- metatags partage facebook -->
        <meta property="og:url" content="http://www.ecole-theatrale.fr/l-ecole-theatrale-russe.php"/>
        <link rel="image_src" href="http://www.ecole-theatrale.fr/images-site/demain-le-printemps-masterclass-large-1.jpg"/>
        <meta property="og:image" content="http://www.ecole-theatrale.fr/images-site/demain-le-printemps-masterclass-large-1.jpg" />
        <meta property="og:type" content="website"/>
        <meta property="og:title" content="L'école théatrale russe" />
        <meta property="og:description" content="L’enseignement proposé est issu de la tradition théâtrale d’Europe de l’Est. Intensif et pluridisciplinaire, il répond à un besoin d’exigence et une soif d’apprendre exprimée par de nombreux aspirants comédiens, venant principalement d’Europe et du Québec et ne trouvant pas de formation équivalente…" />
        <meta property="fb:admins" content="1646749480" />
        <meta property="fb:app_id" content="732457290110432" />
        <!-- fin metatags partage facebook -->


		<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.10.2.js"></script>
        <link rel="icon" type="image/png" href="/images-design/mafavicon-1.ico" />
	</head>
	
<body>
	<!--Bouton Facebook-->
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

        
            $cpid = 2;
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
                    <div class="conteneur" style="overflow:auto">
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
                
                ?><?php
                $turn = 1;
                
                    ?>

                    <?php if ($turn == 1) {
                        ?>
                        <div class="text-bloc1">

                            <?php
                            $cpt = 0;
                            for ($i = 0; $i < 3; $i++) {
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
                                } 
                                 else {
                                    $cpt = 0;
                                }
                            }
                            ?>    </div> <?php
                            $turn++;
                        }
                        ?>
		<div id ="paragraphe-image"> <?php
                        if ($turn == 2) {
                            ?>

                            <div class="text-bloc2">

                                    <?php
                                    $cpt = 0;
                                    for ($i = 0; $i < 3; $i++) {
                                    if ($cpt == 0) {
                                       ?>
                                        <h1> <?php echo ($contenupage[$i+4]) ?> </h1>
                                        <?php
                                        $cpt++;
                                    } else if ($cpt == 1) {
                                        ?>
                                        <h2> <?php echo ($contenupage[$i+4]) ?> </h2>
                                        <?php
                                        $cpt++;
                                    } else if ($cpt == 2) {
                                        ?>
                                        <p> <?php echo ($contenupage[$i+4]) ?> </p>
                                        <?php
                                       
                                        $cpt++;
                                    
                                    } else {
                                        $cpt = 0;
                                    }
                                }
                                ?>    </div> <?php
                                $turn++;
                            }
                            if($turn == 3)
                            {
                                ?>
                        <aside class="l-ecole-theatrale-russe">
                            <a class="fancybox" rel="group" href="images-site/<?php $contenupage[3] = str_replace("-1.jpg", "-large-1.jpg", $contenupage[3]); echo $contenupage[3]; $contenupage[3] = str_replace("-large-1.jpg", "-1.jpg", $contenupage[3]);   ?>"title="Constantin Stanislavski et Vladimir Nemirovitch-Dantchenko "> <img type="photo" src="images-site/<?php echo $contenupage[3] ?>" title="" alt="demain-le-printemps-masterclass"/></a>
                        </aside>
                            <?php
                                
                            }
                            
                        
                        ?>
            
                        <!--fin div paragraphe-image-->
                    </div>
                        <br/>
			   <div class="text-bloc1">
                             <br/>
                            <?php
                            $cpt = 0;
                            for ($i = 8; $i < $lengthtotalphoto; $i++) {
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
                                } 
                                else if ($cpt == 3 && !empty($contenupage[$i])) 
                        {
                            ?> <!-- l'id de chaques photos sera photo1, photo2, photo3 etc... -->
                            <div class="bloc-image">
                            
                            <img id="<?php echo $contents[$i] ?>" type="photo" style=" max-width: 400px" src="images-site/<?php echo $contenupage[$i] ?>"  />
                            </div>
                            <?php 
                            
                            $cpt = 0;
                        } else {
                                    $cpt = 0;
                                }
                            }
                            ?>    </div> <?php
                            $turn++;
                        
                        ?>
		
		  
		<div class="liens">
			<div class="fb-like" data-href="http://www.ecole-theatrale.fr/l-ecole-theatrale-russe.php" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
			<a href="/pdf/Plaquette-presentation-demain-le-printemps.pdf" target="_blank"><p>> Télécharger le dossier de présentation</p></a>
			<a href="comment-sinscrire.php" target="_blank"><p>> Comment s'inscrire à la Masterclass</p></a>
			<!--<a href="form-pre-inscription-en-ligne.php" target="_blank"><p>> Demande d'informations en ligne</p></a> -->
		</div>
		
		
		
	</div>
	<!-- Fin div conteneur -->
	<?php
			include(dirname(__FILE__)."/barre-laterale.php");
			?>
	<!--Fin section conteneur-superieur-->
	
</section>
	<!-- Add jQuery library -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<!-- Add fancyBox -->
	<link rel="stylesheet" href="/source/jquery.fancybox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="/source/jquery.fancybox.pack.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function() {
			$(".fancybox").fancybox({
			    	helpers: {
			    	              title : {
			    	                  type : 'float'
			    	              }
			    	          }
			    });
		});
	</script>
	
	<?php
		include(dirname(__FILE__)."/footer.php");
	?>
	</body>
</html>
