<?php

$bdd = new PDO('mysql:host=localhost;dbname=alumni_projet', 'root', '');
if(isset($_POST['forminscription']))
{
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$email = htmlspecialchars($_POST['email']);
	$mdp = sha1($_POST['mdp']);
	$mdp2 = sha1($_POST['mdp2']);
	
	if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$reqmail = $bdd->prepare("SELECT * FROM membres WHERE Email = ?");
			$reqmail->execute(array($email));
			$mailexist = $reqmail->rowCount();
			if($mailexist == 0)
			{
				if($mdp == $mdp2)
				{
					$insertmbr = $bdd->prepare("INSERT INTO membres(Nom, Prenom, Email, Mdp) VALUES(?,?,?,?)");
					$insertmbr->execute(array($nom, $prenom, $email, $mdp));
					$erreur = "Votre compte a bien été créé ! <a href=\"login.php\">Me connecter</a>";
				}
				else
				{
					$erreur = "Vos mots de passe ne correspondent pas !";
				}
			}
			else
			{
				$erreur = "Adresse mail déjà utilisée !";
			}
		}
		else
		{
			$erreur = "Votre adresse email n'est pas valide !";
		}
	}
	else
	{
		$erreur = "   Tous les champs doivent être complétés !";
	}
}

?>

<!DOCTYPE HTML>

<html>
	<head>
		<title>AIM - Inscription</title>
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
						<a href="contact.php">Contact</a>
						<a href="presentation.php">Présentation</a>
						<a href="login.php">Se connecter</a>
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

		<!-- Message d'erreur -->
			<div align="center">
				<?php
					if (isset($erreur))
					{
						echo '<b> <font color="black">' .$erreur. '</font></b>';
					}
				?>
			</div>

		<!-- Main -->
			<section id="main" name="erreur">
				<div class="inner">
					<header>
						<h2>Inscription</h2>
					</header>
					<form method="POST" action="">
						<div class="field half first">
							<label for="nom">Nom</label>
							<input type="text" name="nom" id="nom" placeholder="Votre nom" value="<?php if (isset($nom)) { echo $nom; } ?>" />
						</div>
						<div class="field half">
							<label for="prenom">Prénom</label>
							<input type="text" name="prenom" id="prenom" placeholder="Votre prénom" value="<?php if (isset($prenom)) { echo $prenom; } ?>" />
						</div>
						<div class="field">
							<label for="email">Email</label>
							<input type="email" name="email" id="email" placeholder="Votre adresse email" value="<?php if (isset($email)) { echo $email; } ?>" />
						</div>
						<div class="field">
							<label for="mdp">Mot de passe</label>
							<input type="password" placeholder="Votre mot de passe" name="mdp" id="mdp" />
						</div>
						<div class="field">
							<label for="mdp2">Confirmation de mot de passe</label>
							<input type="password" name="mdp2" placeholder="Confirmation" id="mdp2" />
						</div>
						<ul class="actions">
							<li><input name="forminscription" type="submit" value="S'inscrire" class="alt" /></li>
						</ul>
					</form>
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