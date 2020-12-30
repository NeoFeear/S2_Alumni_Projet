<?php 
session_start(); 

$bdd = new PDO('mysql:host=localhost;dbname=alumni_projet', 'root', '');
if(isset($_GET['ID']) AND $_GET['ID'] > 0)
{
	$getid = intval($_GET['ID']);
	$requser = $bdd->prepare('SELECT * FROM membres WHERE ID = ?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
}

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>AIM - Évènements</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="accueil.php" class="logo">alumni info metz</a>
					<nav id="nav">
						<a href="accueil.php">Accueil</a>
						<a href="evenements.php">Évènements</a>
						<a href="annuaire.php">Annuaire</a>
						<a href="presentation.php">Présentation</a>
						<a href="contact.php">Contact</a>
						<?php
						if(isset($_SESSION['ID']))
						{
						?>
							<a href="logout.php">Se déconnecter</a>
						<?php
						}
						else
						{
						?>
							<a href="login.php">Se connecter</a>
						<?php
						}
						?>
					</nav>
				</div>
			</header>
			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h1>Alumni Metz Info:<br />
					<span>Association d'anciens élèves <br />de L'IUT Info de Metz</span></h1>
				</div>
			</section>

		<!-- Main -->
			<section id="main" >
				<div class="inner">
					<header class="major special">
						<h1>Évènements passés</h1>
						<p>Ces derniers mois, plusieurs évènements ont eu lieu dans l'enceinte de l'IUT de Metz, tels que la matinée PPP, la journée portes ouvertes, ou encore la soirée des anciens.</p>
					</header>
					<h2>La matinée PPP</h2>
    
    	<p style="text-indent:2em">
            Cette année, la matinée PPP a eu lieu le samedi 18 janvier. A cette occasion, les étudiants de première année ont pu découvrir lors d'une présentation en amphithéatre, le parcours scolaire et professionnel d'anciens élèves de l'IUT ou d'intervenants. Après cette présentation, les étudiants se sont répartis dans plusieurs salles afin de pouvoir poser des questions concernant les métiers des intervenants présents. Puis s'en est suivi un pot où les étudiants ont eu à nouveau l'occasion de discuter avec des professionnels qu'ils n'avaient pas pu côtoyer lors des tables rondes par exemple.
		</p>
		<div >
				<center><img src="images/ppp01.jpg" alt=""  width="50%" /></center>
		</div>

	<br>
	<div class="image right">
		<img src="images/JPO01.jpg">
	</div>

	<h2>La journée Portes Ouvertes</h2>

	<p style="text-indent:2em">

            Le 8 février, lors de la journée portes ouvertes, nous avons pu accueillir des lycéens ou d'autres personnes étant intéressées par les études proposées au sein de notre département. Ces personnes ont pu visiter les locaux et assister à des démonstrations de projet grâce à la présence d'étudiants, de professeurs ainsi que d'anciens élèves, à qui elles ont pu poser toutes leurs questions. 
		</p>

		<br>
		<br>
		<br>
		<br>
	
	
	
	<h2>
		La soirée des anciens</h2>
	
		<div class = "image left">
        <img src="images/soiree1.jpg">
		</div>
	

		<p style="text-indent:2em">
	
	Plus récemment, le 12 mars a eu lieu la traditionnelle soirée des anciens, qui a été précedée par un job dating, pendant lequel les étudiants de deuxième année ont échangé avec des anciens élèves du département.
</p>
<br>
<br>
<br>
        
		
</div>	
</div>


			</section>

		<!-- Footer -->
		<footer>
			<section id="footer">
				<div class="inner">
					<div class="copyright">
						&copy; Site conçu par Florian Martin, Tom Dussaussois, Claire Thil, Mehdi Akniou et Ajdin Topalovic.
					</div>
				</div>
			</section>
</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>