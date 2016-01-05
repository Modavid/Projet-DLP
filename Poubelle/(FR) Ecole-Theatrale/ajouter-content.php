<!DOCTYPE html >
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <a href="form-modifier-content.php"></a>
        <!--[if lt IE 9]>
        <a href="supprimer-content.php"></a>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <a href="modifier-content.php"></a>
        <![endif]-->
        <link href="style/style-l-ecole-theatrale-russe.css" rel="stylesheet" media="all" type="text/css">

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
            <div class="conteneur">
                <?php
                include("auth.php");
                include("db_config.php");
                mysql_set_charset('UTF8');
                $conn = mysql_connect($DB_host, $DB_login, $DB_pass);
                $db = mysql_select_db($DB_select, $conn);
                if (!$conn) {
                    die('Connection error: ' . mysql_error());
                }
                $cpid = $_GET["cpid"];

                $SQL2 = "SHOW columns from contenupage ";

                $result2 = mysql_query($SQL2);

                $length = mysql_num_rows($result2);

                // 22
                $lengthtotalphoto = $length - 2; //20
                $lengthdiv = $lengthtotalphoto / 4; // 5
                $lengthadd = $lengthdiv + 1;
                
                
                $contents = array();
                        

                            array_push($contents, "titre$lengthadd");
                            array_push($contents, "soustitre$lengthadd");
                            array_push($contents, "texte$lengthadd");
                            array_push($contents, "photo$lengthadd");
                            
                           
                
                for($i = 0; $i < 4; $i++)
                {
                    if($i == 2)
                    {
                       $SQL = "ALTER TABLE contenupage ADD ". $contents[$i] ." longtext not null";
                       $result = mysql_query($SQL);
                      
                    }
                    else
                    {
                       $SQL = "ALTER TABLE contenupage ADD ". $contents[$i] ." text not null"; 
                       $result = mysql_query($SQL);
                       
                    }
                }

                

                

                if ($result) {
                    ?> 
                    <h2 style="padding-left: 30px">
                        Du contenu supplémentaire à été ajouté 
                        <br><br>
                        <a href="form-modifier-content.php?cpid=<?php echo $cpid ?>">Voir le changement</a>

                    </h2>
                    <?php
                } else {
                    ?>
                    <script>
                        alert('DATABASE PROBLEM');
                    </script>
                    <a href="index.php">Retour</a>
                    <?php
                }



//}






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
