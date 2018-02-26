<?php
session_start(); # pour accéder à $_SESSION
#Vérification de la connexion
if (!isset($_SESSION['username'])){
	#Si le nom d'utilisateur n'a pas été rentré on redirige vers la page de connexion
	header("Location: index.php");
}
var_dump($_SESSION);
var_dump($_POST);
?>

<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8"/>
  <meta name="author" content="Fossier">
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Le jeu de la Roulette</title>
  </head>
  <body>
  <h1> Le jeu de la roulette</h1>
    <?php 
    $mise = $_SESSION['mise']*35;
    $numero = rand(1,36)
	echo 'Le numéro tiré est le '.$numero.' et vous avez misé '.$_SESSION['mise'].' €.';

	if ($_SESSION['choixMise']== $numero){
			$mise = $_SESSION['mise']*35;
			gagner();
		}
	elseif ($_SESSION['choixMise'] == "pair") {
		if ($numero%2 == 0) {
			$mise = $_SESSION['mise']*2;
			gagner();
		}
		else echo '<p>Désolé c\'est perdu !</p>';
	}
	elseif ($_SESSION['choixMise'] == "impair") {
		if ($numero%2 == 1) echo '<h2>Bravo, récupérez vos gains !</h2>';
		else echo '<p>Désolé c\'est perdu !</p>';
	}
	else echo '<p>Désolé c\'est perdu !</p>';

	function gagner()
	echo'	
	<form>
		<audio id="sonGains" style="display: none;">
			<source src="money_2.mp3" type="audio/mp3" />
		</audio>		
	
		<input type="button" onclick="document.getElementById(\'sonGains\').play();alert(\'Vous gagnez '.$mise.' balles !!!1!!11!\')" value="Here comes the money..."><br>';
	?>
	</form>
	
	<p><form method="POST" action="roulette.php">
		<input type="submit" name="replay" value="Rejouer" >
	</form></p>


	<a href= http://localhost/ProjetPHP/TP2/index.php?deconnexion>Se déconnecter</a>

	<a href= index.php?deconnexion>Se déconnecter</a>
  </body>
</html>