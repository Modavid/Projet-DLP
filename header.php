<!-- ANCIEN HEADER -->
		<?php
			$ua = $_SERVER['HTTP_USER_AGENT'];
			if(preg_match("(iPhone|iPod|iPad|BlackBerry|Android|HTC|LG|MOT|Nokia|Palm|SAMSUNG|SonyEricsson|Mobile)",$ua))
			{
				?>
				<meta http-equiv="refresh" content="0;URL=http://www.ecole-theatrale.fr/m/">
				<?php
				exit;
			}
/* include_once("google-analytics.php");

include('auth.php');
include("db_config.php");

if($_SESSION['AUTH']==3) include('header-etudiant.php');
	else if($_SESSION['AUTH']==2) include('header-prof.php');
	else if($_SESSION['AUTH']==1) include('header-admin.php');
else include('header-base.php');*/
?>
<!-- FIN ANCIEN HEADER -->


<?php 
include_once("google-analytics.php");

//include qui serviront plus tard
include("db_config.php");
include('auth.php');
?>

<!-- début header -->
<link rel="stylesheet" href="style/style-header.css"/>
<div id="logo-and-titre">
 	<a href="index.php"><aside id="logo"></aside></a>
	</div>

<!--Body-->
<section class="header">
		
	<div id="langues">
		<p>
			<a href="http://www.ecole-theatrale.fr/">FR</a> | 
			<a href="http://tomorrow-spring.org/">EN</a> | 
			<a href="http://www.morgenistfruehling.de/">DE</a> |
			<a href="http://www.escuelateatralrusa.es/">ES</a> |
			<a href="http://www.moo-teatro.org/rus">RU</a> | 
			<a href="http://www.ming-chun.org/">CN</a> | 
			<a href="http://www.morgaulaprintempo.eu/">EO</a>
		</p>
	</div>
	
	<nav id="nav">
		<ul >
		
				<li>
				<a class="menu-trait" href="#">Asso</a>
				<ul>
					<li> <a href="asso.php">Présentation</a> </li>
					<li> <a href="collectif.php">Collectif</a> </li>
					<li> <a href="press.php">Presse</a> </li>
					<li> <a href="partenaires.php">Partenaires</a> </li>
					<li> <a href="/pdf/Plaquette-d'adhésion-DLP.pdf" target="_blank">Nous soutenir</a> </li>
				</ul>	
			</li>
			<li> 
				<a class="menu-trait" href="#">École</a>
				<ul id="ecole">
				    
					<li> <a href="l-ecole-theatrale-russe.php">École théâtrale Russe</a> </li>
					<li> <a href="contenu-pedagogique-ecole.php">Contenu pédagogique</a> </li>
					<li> <a href="traduction.php">Traduction</a> </li>
					<li> <a href="l-equipe-pedagogique.php">Équipe pédagogique</a> </li>
					<li> <a href="video.php">En images</a> </li>
					<li> <a href="se-cultiver.php">Se cultiver</a> </li>
					
				</ul>
			</li>
			
			<li>
				<a class="menu-trait" href="#">Masterclass</a>
				<ul>
					<li> <a href="presentation-masterclass.php">Présentation</a> </li>
					<li> <a href="pdf/planning-tournee.pdf" target="_blank">Tournée</a> </li>
					<li> <a href="emploi-du-temps.php">Emploi du temps</a> </li>
					<li> <a href="site-a-minsk.php">L’hébergement</a> </li>
					<li> <a href="tarif-devis.php">Tarifs et Devis</a> </li>
					
				</ul>
					
			</li>
			
			<li>
				<a class="menu-trait" href="#">Stage</a>
				<ul>
					<li> <a href="stage-minsk.php">Présentation</a> </li>
					<li> <a href="rtbd.php">RTBD</a> </li>
					<li> <a href="/pdf/Planning-stage-août-2015.pdf" target="_blank">Planning</a></li> 
					<li> <a href="site-a-minsk.php">L’hébergement</a> </li>
					<li> <a href="tarif-devis.php">Tarifs et Devis</a>
				    
				</ul>
			</li>
			
			<li>
				<a class="menu-trait" href="#">Admission</a>
				<ul>
					<li> <a href="comment-sinscrire.php">S’inscrire à la Masterclass</a> </li>
					<li> <a href="sinscrire-au-stage.php">S’inscrire au Stage</a> </li>
					<li> <a href="seance-decouverte.php">Séance de découverte</a> </li>
					<li> <a href="form-pre-inscription-en-ligne.php">Demande d'information</a> </li>
					
				</ul>	
			</li>
			
			<li>
				<a class="menu-trait" href="#">Paroles d’élèves</a>
				<ul>
					<li> <a href="temoignages-etudiant.php">Témoignages </a> </li>
					<li> <a href="portrait.php">Portraits</a> </li>
					<li> <a href="nos-eleves-masterien.php">Nos masteriens</a> </li>
					<li> <a href="nos-eleves-stagiaire.php">Nos stagiaires</a> </li>
				</ul>	
			</li>
			
				<li>
				<a class="menu-trait" href="http://ecole-theatrale.fr/contact.php">Contact</a>
				</li>
			
			
			
	
			
			<!-- SI connecté sous ADMIN on ajoute un menu -->
			<?php if($_SESSION['AUTH']==1){ ?>
			<li>
				<a class="menu-trait" href="#">Gérer</a>
				<ul>
					<li> <a href="form-profil-pedago.php">Gestion de profil</a> </li>
					<li> <a href="form-ajouter-portrait.php">Ajouter un portrait</a> </li>
					<li> <a href="form-ajouter-actu.php">Ajouter une actu</a> </li>
					<li> <a href="form-fiches-culture.php">Ajouter une fiche culture</a> </li>
					<li> <a href="gerer-inscriptions.php">Gérer les validations</a> </li>
                                        <li> <a href="form-gerer-partenaire.php">Gérer les partenaires</a> </li>
					<li> <a href="form-ajouter-eleve.php">Ajouter un étudiant</a> </li>
					<li> <a href="form-ajouter-membre.php">Ajouter un membre</a> </li>
					<li> <a href="form-ajouter-stagiaire.php">Ajouter un stagiaire</a> </li>
					<li> <a href="liste_fans.php">Liste des fans</a> </li>
					<li> <a href="liste_candidats.php">Liste des candidats</a> </li>
					<li> <a href="https://www.google.com/analytics/web/" target="_blank">Google Analytics</a> </li>
				</ul>
			</li>
			
			<!-- SINON SI connecté sous PROF on ajoute un autre menu -->
			<?php }
			
			else if($_SESSION['AUTH']==2) {
			?>
			<li>
				<a class="menu-trait" href="#">Ajouter</a>
				<ul>
					<li> <a href="form-profil-pedago.php">Gestion de profil</a> </li>
					<li> <a href="form-ajouter-actu.php">Ajouter une actu</a> </li>
					<li> <a href="form-fiches-culture.php">Ajouter une fiche culture</a> </li>
				</ul>
			</li>
			
			<!-- SINON on ajoute rien -->
			<?php } 
			
			else { }
			?>
		</ul>
	</nav>
		
	<!-- sous-header de base SI non-connecté -->
	<?php if (empty($_SESSION['AUTH'])) { ?>
	<section id="sous-header">
		<a href="connexion.php">Se connecter</a> | <a href="form-creer-compte.php">Créer un compte</a>
	</section>
	<?php } ?>
	
	<!-- SI connecté ETUDIANT -->
	<?php
	if($_SESSION['AUTH']==3 ) {
		$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
		$db = mysql_select_db($DB_select, $conn);
		if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
		
		$eid=$_SESSION['USERID'];
		$SQL="SELECT prenom, photo FROM etudiants WHERE eid='$eid'";
		$result=mysql_query($SQL);
		$row=mysql_fetch_array($result);
		$prenom=htmlspecialchars($row['prenom']);
		$nom=htmlspecialchars($row['nom']);
		$photo=htmlspecialchars($row['photo']);
	?>
	<section id="sous-header">
			 <p>Bonjour, <?php echo $prenom." ".$nom;?></p>
			 <a href="afficher-profil-eleve.php?eid=<?php echo $eid;?>&test=<?php echo $photo;?>">Mon Profil</a> | <a href="deconnexion.php">Déconnexion</a>
	</section>
	<?php } ?>
        
        <!-- SI connecté fan ou candidat -->
	<?php
	if($_SESSION['AUTH']==4 ) {
		$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
		$db = mysql_select_db($DB_select, $conn);
		if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
		
		$uid=$_SESSION['USERID'];
		$SQL="SELECT prenom, photo FROM utilisateurs WHERE uid='$uid'";
		$result=mysql_query($SQL);
		$row=mysql_fetch_array($result);
		$prenom=htmlspecialchars($row['prenom']);
		$nom=htmlspecialchars($row['nom']);
		$photo=htmlspecialchars($row['photo']);
	?>
	<section id="sous-header">
			 <p>Bonjour, <?php echo $prenom." ".$nom;?></p>
                         <a href="afficher-profil-fc.php?uid=<?php echo $uid;?>&test=<?php echo $photo;?>">Mon Profil</a> | <a href="deconnexion.php">Déconnexion</a>
	</section>
	<?php } ?>
	
	<!-- SI connecté PROF -->
	<?php
	if($_SESSION['AUTH']==2){		
		$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
		$db = mysql_select_db($DB_select, $conn);
		if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
			
		$cid=$_SESSION['USERID'];
		$SQL="SELECT prenom, nom, photo,cid FROM collectif WHERE cid='$cid'";
		$result=mysql_query($SQL);
		$row=mysql_fetch_array($result);
		$prenom=htmlspecialchars($row['prenom']);
		$nom=htmlspecialchars($row['nom']);
		$photo=htmlspecialchars($row['photo']);
		$cid=htmlspecialchars($row['cid']);
	
	?>
	<section id="sous-header">
			 <p>Bonjour, <?php echo $prenom." ".$nom;?></p>
			 <a href="afficher-profil-pedago.php?cid=<?php echo $cid;?>&test=<?php echo $photo;?>">Mon Profil</a> | <a href="deconnexion.php">Déconnexion</a>
	</section>
	<?php
	
	} 
	//SI connecté ADMIN
	if ($_SESSION['AUTH']==1)
	{
		$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
		$db = mysql_select_db($DB_select, $conn);
		if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
		$uid=$_SESSION['uid'];
		$SQL="SELECT * FROM utilisateurs WHERE uid='$uid'";
		$result=mysql_query($SQL);
		$row=mysql_fetch_array($result);
		$prenom=htmlspecialchars($row['prenom']);
		$nom=htmlspecialchars($row['nom']);
		$photo=htmlspecialchars($row['photo']);
		$id=$_SESSION['USERID'];
		
		$cid=htmlspecialchars($row['cid']);	
		$eid=htmlspecialchars($row['eid']);	
		if ($eid ==0){ 
		?>
		<section id="sous-header">
			 <p>Bonjour, <?php echo $prenom." ".$nom;?></p>
			 <a href="afficher-profil-pedago.php?cid=<?php echo $cid;?>&test=<?php echo $photo;?>">Mon Profil</a> | <a href="deconnexion.php">Déconnexion</a>
		</section>
		<?php
		}else if ($cid == 0) {
			
			?>
		<section id="sous-header">
			 <p>Bonjour, <?php echo $prenom." ".$nom;?></p>
			 <a href="form-profil-etudiant.php?eid=<?php echo $eid;?>&test=<?php echo $photo;?>">Mon Profil</a> | <a href="deconnexion.php">Déconnexion</a>
		</section>
		<?php
		}
		
	}
	
	
	
	?>
	
<!--Fin body-->
</section>
<!-- fin header-->