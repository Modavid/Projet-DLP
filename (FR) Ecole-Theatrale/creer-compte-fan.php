<!DOCTYPE html >
<?php ini_set('display_errors', 'off'); ?>
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
            <div class="conteneur">
               <div id="paragraphe-image">
			            <div class="text-bloc2">
			     <h1 style="text-align:center">Créer un compte</h1> 
                   <p style="margin-left:80px; "> <b>Merci de télécharger une photo de moins de 500 Ko soit 0,5 Méga octet. La photo est obligatoire pour créer votre compte.</b></p><br>
                   </div>    
                   			   
					<img src="/images-design/ruban-fan-du-projet.png">                     
					  </div>
					   
                <div class="conteneur-formulaire">
                     <form method="post" action="nouveau-compte.php" enctype="multipart/form-data" class="formulaire">                     
					  
                       <section class="ligne" style="padding-left: 20px;padding-bottom: 10px" width="300px">
				<span class="titre-ligne">Photo de profil</span>
                                   
                                <input type="file" name="myfile" id="myfile">
				
			</section >

                        <section class="ligne" style="padding-left: 20px;padding-top: 30px" width="300px">
                            <span class="titre-ligne">Nom</span>
                            <input type="text" name="nomph"required>
                        </section>

                        <section class="ligne" style="padding-left: 20px;padding-top: 30px" width="300px">
                            <span class="titre-ligne">Prenom</span>
                            <input type="text" name="prenomph"required>
                        </section>


                        <section class="ligne" style="padding-left: 20px;padding-top: 30px" width="300px">
                            <span class="titre-ligne">Email</span>
                            <input type="text" name="mail"required>
                        </section>
                      
                        <section class="ligne" style="padding-left: 20px;padding-top: 30px" width="300px">
                            <span class="titre-ligne">login</span>
                            <input type="text" name="login"required>
                        </section>
                    
                        <section class="ligne" style="padding-left: 20px;padding-top: 30px" width="300px">
                            <span class="titre-ligne">Mot de passe</span>
                            <input type="text" name="mdp"required>
                        </section>
                        	
                        <section class="ligne" style="padding-left: 20px;padding-top: 30px" width="300px">
                            <span class="titre-ligne">Confirmer mot de passe</span>
                            <input type="text" name="cmdp"required>
                        </section>
                        <section class="ligne" >
                            <input type="hidden" name="type" value="fan"  >
                        </section>
                            <input type="submit" value="Envoyer" name="submit">
                    </form>
                </div>
            </div>
        </section>


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