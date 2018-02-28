<?php
session_start(); # pour accéder à $_SESSION
#Vérification de la connexion
if (!isset($_SESSION['username'])){
	#Si le nom d'utilisateur n'a pas été rentré on redirige vers la page de connexion
	header("Location: index.php");
}
if (!isset($_SESSION['mise'])){
	#Si la mise n'est pas définie on redirige vers la page roulette
	header("Location: roulette.php");
}
#on retire la mise
$_SESSION['money'] = $_SESSION['money'] - $_SESSION['mise'];
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
    $numero = rand(1,36);
	echo 'Le numéro tiré est le '.$numero.' et vous avez misé '.$_SESSION['mise'].' € sur le numéro '.$_SESSION['choixMise'].'.';

	if ($_SESSION['choixMise']== $numero){
			$gain = $_SESSION['mise']*35;
			gagner($gain);
		}
	elseif ($_SESSION['choixMise'] == "pair") {
		if ($numero%2 == 0) {
			$gain = $_SESSION['mise']*2;
			gagner($gain);
		}
		else perdre();
	}
	elseif ($_SESSION['choixMise'] == "impair") {
		if ($numero%2 == 1) {
			$gain = $_SESSION['mise']*2;
			gagner($gain);
		}else perdre();
	}
	else perdre();

	function gagner($gain)
	{
	echo '<h2>Bravo, récupérez vos gains !</h2>';
	echo'<p><form method="POST" action="resultat.php">
		<audio id="sonGains" style="display: none;">
			<source src="money_2.mp3" type="audio/mp3" />
		</audio>		
	
		
		<input type="submit" name="replaygain" onclick="document.getElementById(\'sonGains\').play();alert(\'Vous gagnez '.$gain.' balles !!!\')" value="Here comes the money..." >
		</form></p>';
	}
	function perdre(){
		echo '<h2>Désolé, c\'est perdu.</h2>';
		echo'<p><form method="POST" action="resultat.php">
		<audio id="sonGains" style="display: none;">
			<source src="money_2.mp3" type="audio/mp3" />
		</audio>		
	
		
		<input type="submit" name="replayperd" value="Rejouer" >
		</form></p>';
	}
	
	if (isset($_POST['replaygain'])) {
	#Le joueur engrange ses gains
	$_SESSION['money'] = $_SESSION['money'] + $gain;
	#puis retour à la roulette
	header("Location: roulette.php");
}
if (isset($_POST['replayperd'])) {
	#direction à la roulette direct
	header("Location: roulette.php");
}
	?>
	
	
	


	<a href= http://localhost/ProjetPHP/TP2/index.php?deconnexion>Se déconnecter</a>
	<p>ou</p> 
	<a href= index.php?deconnexion>Se déconnecter</a>
  </body>
</html>