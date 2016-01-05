<?php
	$ua = $_SERVER['HTTP_USER_AGENT'];
	if(!preg_match("(iPhone|iPod|iPad|BlackBerry|Android|HTC|LG|MOT|Nokia|Palm|SAMSUNG|SonyEricsson|Mobile)",$ua))
	{
		?>
		<meta http-equiv="refresh" content="0;URL=http://www.ecole-theatrale.fr/">
		<?php
		exit;
	}
include_once("google-analytics.php");

//include qui serviront plus tard
include("db_config.php");
include('auth.php');
?>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width" />
<link href="dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="dist/css/bootstrap-responsive.min.css" rel="stylesheet" />
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">
	<img style="max-width: 100px;margin-top: -10px;max-height: 40px;" src="/images-design/logo.jpg">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">École <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		<li> <a href="l-ecole-theatrale-russe.php">École théâtrale Russe</a> </li>
		<li> <a href="l-equipe-pedagogique.php">Équipe pédagogique</a> </li>
		<li> <a href="site-a-minsk.php">L’hébergement</a> </li>
		<li> <a href="se-cultiver.php">Se cultiver</a> </li>
          </ul>
        </li>
	<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Masterclass <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		<li> <a href="contenu-pedagogique.php">Contenu pédagogique</a> </li>
		<li> <a href="emploi-du-temps.php">Emploi du temps</a> </li>
		<li> <a href="certificat.php">Certificat</a> </li>
		<li> <a href="video.php">Vidéo</a> </li>
          </ul>
        </li>
	<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Stage <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		<li> <a href="stage-minsk.php">Minsk</a> </li>
		<li> <a href="stage-chine.php">Chine</a> </li>
          </ul>
        </li>
	<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admission <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		<li> <a href="comment-sinscrire.php">S’inscrire à la Masterclass</a> </li>
		<li> <a href="sinscrire-au-stage.php">S’inscrire au Stage</a> </li>
		<li> <a href="seance-decouverte.php">Séance de découverte</a> </li>
		<li> <a href="form-pre-inscription-en-ligne.php">Pré-inscription en ligne</a> </li>
		<li> <a href="tarif-devis.php">Tarifs et Devis</a> </li>
          </ul>
        </li>
	<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Paroles d’élèves <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		<li> <a href="temoignages-etudiant.php">Témoignages </a> </li>
		<li> <a href="portrait.php">Portraits</a> </li>
		<li> <a href="nos-eleves-masterien.php">Nos masteriens</a> </li>
		<li> <a href="nos-eleves-stagiaire.php">Nos stagiaires</a> </li>
		<li class="divider"></li>
		<li> <a href="https://demainleprintemps.wordpress.com/">BLOG</a> </li>
          </ul>
        </li>
	</li>
	<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Asso <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		<li> <a href="asso.php">Présentation</a> </li>
		<li> <a href="collectif.php">Collectif</a> </li>
		<li> <a href="press.php">Presse</a> </li>
		<li> <a href="partenaires.php">Partenaires</a> </li>

          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php if($_SESSION['AUTH']==1){ ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gérer <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		<li> <a href="form-profil-pedago.php">Gestion de profil</a> </li>
		<li> <a href="form-ajouter-portrait.php">Ajouter un portrait</a> </li>
		<li> <a href="form-ajouter-actu.php">Ajouter une actu</a> </li>
		<li> <a href="form-fiches-culture.php">Ajouter une fiche culture</a> </li>
		<li> <a href="gerer-inscriptions.php">Gérer les validations</a> </li>
		<li> <a href="form-ajouter-eleve.php">Ajouter un étudiant</a> </li>
	        <li class="divider"></li>
		<li> <a href="https://www.google.com/analytics/web/" target="_blank">Google Analytics</a> </li>
          </ul>
        </li>
      <?php }
      else if($_SESSION['AUTH']==2) {
	?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
		<li> <a href="form-profil-pedago.php">Gestion de profil</a> </li>
		<li> <a href="form-ajouter-actu.php">Ajouter une actu</a> </li>
		<li> <a href="form-fiches-culture.php">Ajouter une fiche culture</a> </li>
          </ul>
        </li>
	<?php }
	if (empty($_SESSION['AUTH'])) { ?>
	<li> <a href="connexion.php">Se connecter</a> </li>
	<li> <a href="form-creer-compte.php">Créer un compte</a> </li>
	<?php }?>
	<!-- SI connecté ETUDIANT -->
	<?php
	if($_SESSION['AUTH']==3) {
		$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
		$db = mysql_select_db($DB_select, $conn);
		if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
		
		$eid=$_SESSION['USERID'];
		$SQL="SELECT prenom FROM etudiants WHERE eid='$eid'";
		$result=mysql_query($SQL);
		$row=mysql_fetch_array($result);
		$prenom=htmlspecialchars($row['prenom']);
		$nom=htmlspecialchars($row['nom']);
	?>
	<li> <a href="form-profil-etudiant.php">Mon Profil</a> </li>
	<li> <a href="deconnexion.php">Déconnexion</a> </li>
	<?php } ?>
	
	<!-- SI connecté PROF OU ADMIN -->
	<?php
	if(($_SESSION['AUTH']==2) || ($_SESSION['AUTH']==1)) {		
		$conn = mysql_connect($DB_host, $DB_login, $DB_pass);
		$db = mysql_select_db($DB_select, $conn);
		if (!$conn) { die('Erreur de connexion: ' . mysql_error()); }
			
		$cid=$_SESSION['USERID'];
		$SQL="SELECT prenom, nom FROM utilisateurs WHERE cid='$cid'";
		$result=mysql_query($SQL);
		$row=mysql_fetch_array($result);
		$prenom=htmlspecialchars($row['prenom']);
		$nom=htmlspecialchars($row['nom']);
	?>
	<li> <a href="form-profil-etudiant.php">Mon Profil</a> </li>
	<li> <a href="deconnexion.php">Déconnexion</a> </li>
	<?php } ?>
	</ul>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<link href="style/style-reset.css" rel="stylesheet" media="all" type="text/css">
<?php
include_once("google-analytics.php");
include("db_config.php");
include('auth.php');
?>
