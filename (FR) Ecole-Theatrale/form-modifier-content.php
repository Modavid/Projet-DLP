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
        include(dirname(__FILE__) . "/header.php");
        ?>
        <section class="conteneur-superieur">	
            <div class="conteneur" >
                <?php
                include("db_config.php");
                mysql_set_charset('UTF8');
                $conn = mysql_connect($DB_host, $DB_login, $DB_pass);
                $db = mysql_select_db($DB_select, $conn);
                if (!$conn) {
                    die('Connection error: ' . mysql_error());
                }

                if (isset($_GET['cpid'])) {
                    $cpid = $_GET['cpid'];
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



                            $contenupage[$i] = htmlspecialchars($row[$contents[$i]]);
                        }
                        ?>
                        <h1>Modifier le contenu de <?php echo $nom ?></h1>



                        <form method="post" action="modifier-content.php?cpid=<?php echo $cpid ?>" class="formulaire" enctype="multipart/form-data">
                            <div class="modif-scroll" >

                                <input type="hidden" name="cuid" value="<?php echo $cuid; ?>">
                                <?php
                                $cpt = 0;
                                for ($i = 0; $i < $lengthtotalphoto; $i++) {
                                    if ($cpt != 3 && $cpt != 2) {
                                        ?>
                                        <section>
                                            <span class="titre-ligne"><?php echo $contents[$i] ?></span>
                                            <input type="text" name="<?php echo $contents[$i] ?>" value="<?php
                        echo $contenupage[$i];
                                        ?>" >
                                        </section><br>
                                        <?php
                                        $cpt++;
                                    } else if ($cpt == 2) {
                                        ?>   
                                        <section>
                                            <span class="titre-ligne"><?php echo $contents[$i] ?></span>
                                            <textarea input type="text" name="<?php echo $contents[$i] ?>" cols="40" rows="20"><?php
                                             echo $contenupage[$i];
                                        ?></textarea>
                                        </section><br>
                                        <?php
                                        $cpt++;
                                    } else if ($cpt == 3) {
                                        ?>
                                        <section>
                                            <span class="titre-ligne"><?php echo $contents[$i] ?></span>
                                            <input type="file" name="<?php echo $contents[$i] ?>" >
                                            <a href="supprimer-img.php?cpid=<?php echo $cpid;?>&img=<?php echo $contents[$i] ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette photo?');"><img src="images-design/suppr.png" alt"suppr"/></a>
                                        </section><br>
                                        <?php
                                        $cpt = 0;
                                    }
                                }
                                ?>



                                <br/><br/>
                              <?php  if ($_SESSION['AUTH'] == 1) // seul l'admin peut supprimer ou ajouter dans la base de données
                              { ?>
                                <div class="bloc-ajouter">
                                    
                                    <a href="ajouter-content.php?cpid=<?php echo $cpid ?>" target="_self"> <input type="button" value="Ajouter une rangée">

                                </div>
                                <div class="bloc-supprimer">
                                   
                                    <a href="supprimer-content.php?cpid=<?php echo $cpid ?>" target="_self"> <input type="button" value="Supprimer une rangée"> </a>

                                </div>
                              <?php } ?> 
                                <input type="submit" value="Envoyer">
                                <br><br>    
                            </div>
                        </form>


                        <?php
                    }
                } else {
                    ?>
                    <p>
                        Acc?s refus?.
                    </p>
                    <?php
                }

                mysql_close($conn);
                ?>
            </div> 
            <!-- Fin div conteneur -->
            <?php
            include(dirname(__FILE__) . "/barre-laterale.php");
            ?>
            <!--Fin section conteneur-superieur-->
        </section>
        <!-- Add jQuery library -->
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <!-- Add fancyBox -->
        <link rel="stylesheet" href="/source/jquery.fancybox.css" type="text/css" media="screen" />
        <script type="text/javascript" src="/source/jquery.fancybox.pack.js"></script>

        <script type="text/javascript">
                            $(document).ready(function () {
                                $(".fancybox").fancybox({
                                    helpers: {
                                        title: {
                                            type: 'float'
                                        }
                                    }
                                });
                            });
        </script>

        <?php
        include(dirname(__FILE__) . "/footer.php");
        ?>
    </body>
</html>
