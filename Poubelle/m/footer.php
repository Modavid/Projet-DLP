<link rel="stylesheet" href="style/style-footer.css" />

<!--script loading fancybox-->
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script src="dist/js/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="../lib/fancy-box/source/jquery.fancybox.css" type="text/css" media="screen" />
<script src="..//lib/fancy-box/source/jquery.fancybox.pack.js" type="text/javascript">
</script>

<!--<body>-->
<section id="conteneur-footer">
	
	<!-- corps du footer -->
	
	<div id="menu-footer">
	
		<div class="block-footeur">
			<a href="contact.php" target="_blank"><div class="titre">Contact</div></a>
			<aside><img src="..//images-design/pin-geolocalisation.png"alt="cottage"/>
			<p style="text-align: center;">Demain Le Printemps</p></aside>
			<p style="text-align: center;">14 rue de la Tour d'Auvergne</br>
			75009 Paris</p>
			<p style="text-align: center;">Tel/Fax : +331 42 81 33 96 </br>
			ecole@dlptheatre.net</p>
		</div>
		
		<div class="block-footeur">
			<div class="titre">Plan d'accès</div>
			<a class="carte-fancybox carte-fancybox.iframe" href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2623.8871281414545!2d2.344497440475468!3d48.87942823060259!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x11282a52ae19250c!2sDemain+Le+Printemps!5e0!3m2!1sfr!2sfr!4v1400489555143" target="_blank">
				<img src="../images-design/carte-google.jpg" alt="carte"/>
			</a>
		</div>
		
		<div class="block-footeur">
			<div class="titre">Liens</div>
			<ul style="list-style: none;padding-left: 0px">
				<li><a href="http://demainleprintemps.wordpress.com" target="_blank">Blog</a></li>
				<li><a href="page-actualite.php">Actualité</a></li>
				<li><a href="press.php">Presse</a></li>
				<li><a href="recrutement.php">Recrutement</a></li>
				<li><a href="liens-utiles.php">Plus de liens</a></li>
			</ul>
		</div>
		
		<div class="block-footeur">
			<a href="partenaires.php" target="_blank">
				<div class="titre">Nos partenaires</div>
				<img src="../images-design/bloc-logo.png" alt="partenaire" />
			</a>
		</div>
		
	</div>
	<div id="ligne-mention-legale">
		<p>
			©2014 Demain le Printemps Association Loi 1901 |
			<a href="mentions-legales.php" target="_blank">
				Mentions légales
			</a> |
			<a href="developpeurs.php">
				Développeurs
			</a>
		</p>
	</div>
	
	<script type="text/javascript">
		$(document).ready(function() {
			$(".carte-fancybox").fancybox();
	});
			
	</script>

</section>

<!--</body>-->