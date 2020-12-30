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
        <title>AIM - Présentation</title>
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

            <section id="banner">
                <div class="inner">
                    <h1>Alumni Metz Info:<br />
                    <span>Association d'anciens élèves <br />de l'IUT Info de Metz</span></h1>
                </div>
            </section>

        <!-- Main -->
            <section id="main" >
                <div class="inner">
                    <header class="major special">
                        <h1>Présentation</h1>
                    </header>
                    <a href="#" class="image fit"><img src="images/pic11.png" alt="" /></a>
                    <p>Le département informatique se trouve à l'IUT de Metz sur le campus du Saulcy.</p>
                    <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1305.6164285904308!2d6.162705358249692!3d49.12021259482848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4794dbffe3457bc1%3A0x6d664b5b6b5b44b8!2sIUT%20de%20Metz%2C%20Universit%C3%A9%20de%20Lorraine!5e0!3m2!1sfr!2sfr!4v1592227905888!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></p>
                    <h2>Règlements intérieurs</h2>
                    <p>Voici les deux textes en vigueur, validés par le Conseil d'IUT du 6 juillet 2019 :</p>
<ul>
    <li><a class="lien"  href="http://iut-metz.univ-lorraine.fr/sites/default/files/D%C3%A9partement%20INFO_R%C3%A8glement%20int%C3%A9rieur%2019%2020.pdf" target = "_blank">RI de l'IUT </a>, applicable à tous les départements.</li>
    <li><a class="lien"  href="https://dptinfo.iutmetz.univ-lorraine.fr/documents/RI_dpt_INFO_2019_2020.pdf"  target = "_blank">RI du département Informatique</a>.</li>    
</ul> 
<h2>Retour sur les Journées Portes Ouvertes</h2>
    
            <p>Grosse affluence sur le stand du département ! Au menu : présence d'étudiants, d'enseignants, mais aussi d'anciens étudiants du département, prêts à répondre à toutes les questions. Visite des locaux, démonstration de projets, etc.</p>

            <p>Merci à tous ceux - nombreux ! - qui se sont investis et ont fait de cette journée une réussite !</p>

            <p><a class="lien" href="http://www.capital.fr/carriere-management/actualites/les-iut-plus-efficaces-que-les-grandes-ecoles-pour-trouver-un-job-815268"  target = "_blank">Pourquoi</a> faire ses études à l'IUT ?</p>

<h2>Programme du DUT</h2>
<p>Voici le <a class="lien" href="http://cache.media.enseignementsup-recherche.gouv.fr/file/25/09/7/PPN_INFORMATIQUE_256097.pdf"  target = "_blank">programme pédagogique national</a> 2013.</p>

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