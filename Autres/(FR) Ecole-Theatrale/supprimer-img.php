
		

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
		$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
		if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
		$db = mysql_select_db($DB_select, $conn);
		
			$cpid =mysql_real_escape_string($_GET['cpid']);
			$img=mysql_real_escape_string($_GET['img']);
                        $photo=mysql_real_escape_string($_POST[$img]);
			$SQL="UPDATE contenupage SET ". $img ."='' WHERE cpid = '$cpid'";
                        $SQL1 = "SELECT * FROM contenupage WHERE cpid='$cpid'";
                        $result1=mysql_query($SQL1);
			$result=mysql_query($SQL);
                       
                        
                        $row = mysql_fetch_array($result1);


                        $nom = htmlspecialchars($row['nom']);
                        
                       
		
		     if ($result) {
                         unlink("images-sites/".$photo);
                                ?> 
                                <h2 style="padding-left: 30px">
                                    La photo a bien été supprimée 
                                    <br><br>
                                    <a href="<?php echo $nom ?>.php">Voir les changements</a>

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

		
		