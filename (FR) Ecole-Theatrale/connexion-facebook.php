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
			$(document).ready(function() {
			
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
	include(dirname(__FILE__)."/header.php");
	?>
<section class="conteneur-superieur">	
	<div class="conteneur">
<?php
  
require 'API/facebook.php';
  
$facebook = new Facebook(array(
  'appId'  => '732457290110432',
  'secret' => 'd8ab6487eb0470b6930bcc032251746a',
  'cookie' => true,
  'oauth' => true
    
));
  
$session = $facebook->getUser();
//echo $session; 
if(empty($session))
    {
        $login_url=$facebook->getLoginUrl();
		echo "<a href=".$login_url.">Veuillez installer l'application Facebook ou vous connecter en cliquant sur cette phrase.</a>";
    }
    else
    {
        try
        {
            $uid=$facebook->getUser();
            $me=$facebook->api('/me');
        }
        catch(Exception $e)
        {
            ?> <span>ERREUR </span><?php
            //print_r($e);
        }
    }
      
if(isset($me))
    {
        $fql = "select uid,name,pic_big from user where uid=$uid";
        $param = array(
            'method' => 'fql.query',
            'query' => $fql,
            'callback' => ''
			
              
        );  
        $fb = $facebook -> api($param);
        //print_r($fb);
                          
        ?>
                          
                        <span>Cliquer ici pour vous connecter : </span>
                        <form method="post" action="facebook-connect.php" >   
                        <input type="hidden" name="fb_id" value=<?php echo $uid;?> /> 
                        <input type="hidden" name="fb_image" value=<?php echo $fb[0]['pic_big'];?> />
                        <input type="hidden" name="fb_name" value=<?php echo $fb[0]['name'];?> />
                        <input type="submit" value="Continuer">
                        </form>
        <?php
    } 
?>
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
