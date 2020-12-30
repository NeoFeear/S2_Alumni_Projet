<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=alumni_projet', 'root', '');
if(isset($_POST['formconnexion']))
{
	$emailconnect = htmlspecialchars($_POST['emailconnect']);
	$mdpconnect = sha1($_POST['mdpconnect']);
	if(!empty($emailconnect) AND !empty($mdpconnect))
	{
		$requser = $bdd->prepare("SELECT * FROM membres WHERE Email = ? AND Mdp = ?");
		$requser->execute(array($emailconnect,$mdpconnect));
		$userexist = $requser->rowCount();
		if($userexist == 1)
		{
			$userinfo = $requser->fetch();
			$_SESSION['ID'] = $userinfo['ID'];
			$_SESSION['Email'] = $userinfo['Email'];
			header("location:accueil.php?id=".$_SESSION['ID']);
		}
		else
		{
			$erreur = "Mauvais email ou mot de passe !";
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
		<title>AIM - Connexion</title>
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
					<header>
						<h2>Connexion</h2>
						<h4>Pas encore inscrit ? <a href="register.php" style="color:black"><u>Inscrivez-vous !</u></a></h4>
					</header>
					<form method="POST" action="login.php">
						<div class="field">
							<label for="email">Email</label>
							<input type="email" name="emailconnect" placeholder="Votre email" value="<?php if (isset($emailconnect)) { echo $emailconnect; } ?>" />
						</div>
						<div class="field">
							<label for="mdp">Mot de passe</label>
							<input type="password" name="mdpconnect" placeholder="Votre mot de passe"></input>
						</div>
						<ul class="actions">
							<li><input type="submit" name="formconnexion" placeholder="Se connecter" class="alt" /></li>
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