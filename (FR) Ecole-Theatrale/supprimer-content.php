<!DOCTYPE html >
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
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
                
                
                
                $contents = array();
                        

                            array_push($contents, "titre$lengthdiv");
                            array_push($contents, "soustitre$lengthdiv");
                            array_push($contents, "texte$lengthdiv");
                            array_push($contents, "photo$lengthdiv");
                            
                         
                
                for($i = 0; $i < 4; $i++)
                {
                    
                       $SQL = "ALTER TABLE contenupage DROP COLUMN ". $contents[$i];
                 
                       $result = mysql_query($SQL);
                       
                    
                }

                

                

                if ($result) {
                    ?> 
                    <h2 style="padding-left: 30px">
                        More content has been added
                        <br><br>
                        <a href="form-modifier-content.php?cpid=<?php echo $cpid ?>">See the records</a>

                    </h2>
                    <?php
                } else {
                    ?>
                    <script>
                        alert('DATABASE PROBLEM');
                    </script>
                    <a href="index.php">Back to homepage</a>
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
