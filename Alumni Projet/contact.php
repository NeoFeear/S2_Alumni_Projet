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

if(isset($_POST['formmessage']))
{
	$identitemsg = htmlspecialchars($_POST['identitemsg']);
	$emailmsg = htmlspecialchars($_POST['emailmsg']);
	$message = htmlspecialchars($_POST['message']);

	if(!empty($_POST['identitemsg']) AND !empty($_POST['emailmsg']) AND !empty($_POST['message']))
	{
		if(filter_var($emailmsg, FILTER_VALIDATE_EMAIL))
		{
			$insertmsg = $bdd->prepare("INSERT INTO messages(Identite, Email, Message) VALUES(?,?,?)");
			$insertmsg->execute(array($identitemsg, $emailmsg, $message));
			$erreur = "Votre message a bien été envoyé !";
		}
		else
		{
			$erreur = "Votre adresse email n'est pas valide !";
		}
	}
	else
	{
		$erreur = "Tous les champs doivent être complétés !";
	}
}

?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Contact</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.html" class="logo">alumni info metz</a>
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

			<section id="banner">
				<div class="inner">
					<h1>Alumni Metz Info:<br />
					<span>Association d'anciens élèves <br />de l'IUT Info de Metz</span></h1>
				</div>
			</section>

		<!-- Message d'erreur -->
			<div align="center">
				<?php
					if (isset($erreur))
					{
						echo '<b><font color="black">' .$erreur. '</font></b>';
					}
				?>
			</div>

		<!-- Main -->
			<section id="main" >
				<div class="inner">
					<header class="major special">
						<p>Si vous avez besoin d'information complémentaire n'hésitez pas à nous contacter soit par mail soit au 03.72.74.84.00.</p>
					</header>

					<?php
					if(isset($_SESSION['ID']))
					{
					?>
					<header>
						<h2>Nous contacter</h2>
					</header>
					<form method="post" action="#">
						<div class="field half first">
							<label for="identite">Identité</label>
							<input type="text" name="identitemsg" id="identite" placeholder="Votre identité" value="<?php if (isset($identitemsg)) { echo $identitemsg; } ?>" />
						</div>
						<div class="field half">
							<label for="email">Email</label>
							<input type="email" name="emailmsg" id="email" placeholder="Votre email" value="<?php if (isset($emailmsg)) { echo $emailmsg; } ?>" />
						</div>
						<div class="field">
							<label for="message">Message</label>
							<textarea name="message" id="messagemsg" rows="6" placeholder="Votre message" ></textarea>
						</div>
						<ul class="actions">
							<li><input name="formmessage" type="submit" value="Envoyer" class="alt" /></li>
						</ul>
					</form>
					<?php
					}
					else
					{
					?>
					<section id="msgerreur">
						<center>
						<header>
							<h2>Veuillez vous connecter pour pouvoir envoyer un message.</h2>
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