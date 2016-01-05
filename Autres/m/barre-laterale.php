<link rel="stylesheet" href="style/style-barre-laterale.css"/>

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="lib/fancy-box/source/rollover-effect.css" type="text/css" media="screen"/> 

<!--Body-->
<section class="conteneur-barre-laterale">

<div class="bloc-reseaux-sociaux">
	<a href="http://demainleprintemps.wordpress.com" target="_blank"><div id="case-blog"><p>Blog</p></div></a>
	<aside id="ligne-icons">
			<a href="https://www.facebook.com/pages/Demain-le-Printemps-Lecole-Theatrale-Russe/106112662782349?fref=ts" target="_blank"><img src="/images-design/icone-fbook.png" alt="Facebook" /></a>
			<a href="https://twitter.com/dlptheatre" target="_blank"><img src="/images-design/icone-twitter.png" alt="Twitter"/></a>
			<a href="https://plus.google.com/111219345700075602953/posts" target="_blank"><img src="/images-design/icone-google.png" alt="Google+"/></a>
			<a href="https://www.youtube.com/channel/UC_1SSe8kg8TI5tCk3QUXQPQ?feature=watch" target="_blank"><img src="/images-design/icone-youtube.png" alt="Youtube"/></a>
		
	</aside>
</div>

<a href="page-actualite.php">
	
			<span class="roll"><div class="text-content">Découvrir toute notre actualité</div></span>
			<img alt="image actualité" src="/images-design/barre-image-actu.jpg">
		<div class="sous-titres-barre"><p>L'actualité</p></div>
	
</a>

<a href="portrait.php">
			<span class="roll"><div class="text-content">Nos anciens élèves</div></span>
			<img alt="image actualité" src="/images-design/image-demain-le-printemps-portrait.jpg">
		<div><p>Portraits</p></div>
</a>

<a href="contenu-pedagogique.php">
			<span class="roll"><div class="text-content">Formation complète 9 mois à Minsk</div></span>
			<img alt="image actualité" src="/images-design/image-demain-le-printemps-formation.jpg"/>
		<div><p>Masterclass</p></div>
</a>


		<!--<iframe width="230" height="120" src="//www.youtube.com/embed/UTHgPqzAG40" frameborder="0" allowfullscreen></iframe>-->
		<object width="230" height="150">
		<param name="movie" value="//www.youtube.com/embed/P_wNFYQEKr0?rel=0</strong>"></param>
		<param name="allowScriptAccess" value="always"></param>
		<embed src="//www.youtube.com/v/P_wNFYQEKr0?version=3&autoplay=0<strong>&modestbranding=1&rel=0</strong>&controls=0&theme=light&title=Mon titre paramétrable&showinfo=0" type="application/x-shockwave-flash" allowscriptaccess="always" width="230" height="150"></embed>
		</object>
	<a href="video.php"><div><p>Toutes nos vidéos</p></div></a>




<script type="text/javascript">
	$(function() {
	<!--OPACITY OF BUTTON SET TO 0%-->
	$(".roll").css("opacity","0");
	 
	// ON MOUSE OVER
	$(".roll").hover(function () {
	 
	// SET OPACITY TO 70%
	$(this).stop().animate({
	opacity: .7
	}, "slow");
	},
	 
	// ON MOUSE OUT
	function () {
	 
	// SET OPACITY BACK TO 50%
	$(this).stop().animate({
	opacity: 0
	}, "slow");
	});
	});
</script>

</section>
<!--Fin body-->