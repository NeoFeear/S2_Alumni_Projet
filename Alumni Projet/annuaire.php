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

$liste = $bdd->prepare("SELECT Nom, Prenom, Email FROM MEMBRES");
$execute = $liste->execute();
$membre = $liste->fetchAll();

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>AIM - Annuaire</title>
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

		<!-- Main -->
			<section id="main">

				<div class="inner">
				<?php
				if(isset($_SESSION['ID']))
				{
				?>
					<header>
						<h2><center>Liste des contacts</center></h2>
					</header>

					<table>	
							<?php foreach ($membre as $membres): ?>
							<tr>
								<td> <?= $membres['Nom'] ?> </td>
								<td> <?= $membres['Prenom'] ?> </td>
								<td> <?= $membres['Email'] ?> </td>
							</tr>
							<?php endforeach; ?>
					</table>
				<?php
				}
				else
				{
				?>

					<section id="msgerreur">
						<center>
						<header>
							<h2>Veuillez vous connecter pour pouvoir les autres inscrits.</h2>
							<br />
							<h3><font color="black"><a href="login.php">Cliquez ici pour vous connecter</a></font></h3>
							<br />
						</header>
						</center>
					</section>	
				<?php
				}
				?>
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