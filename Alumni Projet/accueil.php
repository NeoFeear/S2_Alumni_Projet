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

<html lang="fr">
	<head>
		<title>Alumni Info Metz</title>
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
					<span>Association d'anciens élèves <br />de l'IUT Info de Metz</span></h1>
				</div>
			</section>

		<!-- Two -->
			<section id="two">
				<header>
					<h2><center>Prochains évènements à venir</center></h2>
				</header>
				<div class="inner">
					<article>
						<div class="content">
							<header>
								<h3>Matinée PPP</h3>
							</header>
							<div class="image fit">
								<img src="images/PPP1.jpg" alt="" />
							</div>
							<p>Des anciens étudiants du département Informatique viennent présenter leur parcours post DUT aux étudiants de 1ère année.</p>
						</div>
					</article>
					<article class="alt">
						<div class="content">
							<header>
								<h3>Journée portes ouvertes</h3>
							</header>
							<div class="image fit">
								<img src="images/JPO1.jpg" alt="" />
							</div>
							<p>Accueil et présentation aux lycéens du DUT Info.</p>
						</div>
					</article>
				</div>
			</section>

		<!-- Three -->
			<section id="three">
				<div class="inner">
					<article>
						<div class="content">
							<span class="icon fa-calendar-check-o"></span>
							<header>
								<h3>Évènements</h3>
							</header>
							<p>Liste des évènements passés <br />
								et futurs.</p>
							<ul class="actions">
								<li><a href="evenements.php" class="button alt">Voir</a></li>
							</ul>
						</div>
					</article>
					<article>
						<div class="content">
							<span class="icon fa-users"></span>
							<header>
								<h3>Annuaire</h3>
							</header>
							<p>Retrouver d'anciennes <br />connaissances.</p>
							<ul class="actions">
								<li><a href="annuaire.php" class="button alt">Voir</a></li>
							</ul>
						</div>
					</article>
					<article>
						<div class="content">
							<span class="icon fa-graduation-cap"></span>
							<header>
								<h3>Présentation</h3>
							</header>
							<p>Voir les différentes informations concernant l'IUT.</p>
							<ul class="actions">
								<li><a href="presentation.php" class="button alt">Voir</a></li>
							</ul>
						</div>
					</article>
					<article>
					<div class="content">
							<span class="icon fa-info"></span>
							<header>
								<h3>Contact</h3>
							</header>
							<p>Contacter le secrétariat.</p><br />
							<ul class="actions">
								<li><a href="contact.php" class="button alt">Voir</a></li>
							</ul>
						</div>
					</article>
				</div>
			</section>

		<!-- Footer -->
			<section id="footer">
				<div class="inner">
					<div class="copyright">
						&copy; Site conçu par Florian Martin, Tom Dussaussois, Claire Thil, Mehdi Akniou et Ajdin Topalovic.
					</div>
				</div>
			</section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>