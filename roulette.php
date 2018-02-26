<?php 
session_start(); # pour accéder à $_SESSION
var_dump($_SESSION);
var_dump($_POST);

$error="";
#Vérification de la connexion
if (!isset($_SESSION['username'])){
	#Si le nom d'utilisateur n'a pas été rentré on redirige vers la page de connexion
	header("Location: index.php");
}
#traitement de la mise
if (isset($_POST['SubmitBtn'])) {
	#vérifier les données
	if($_POST['mise']!="" && $_POST['mise'] <= $_SESSION['money'] ) {
		if($_POST['choixMise']!="") {
			#remplir la session
			$_SESSION['yukulele']="ma guitare?";
			$_SESSION['mise'] = $_POST['mise'];
			$_SESSION['choixMise'] = $_POST['choixMise'];
			#puis direction la roulette
			header("Location: resultat.php");
		}
		else { $error = "Choisissez un numéro";}
	} else { $error = "Montant de la mise supérieur à votre solde";}
}	
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
	if($error != "");
		echo '<div id=error>'.$error.'</div>';
	echo '<h2>Bienvenue '.$_SESSION['username'].' !</h2>';
	
	echo '<p> Vous disposez de '.$_SESSION['money'].' €. Combien voulez-vous miser?</p>';
	?>

	<form method="post" action="roulette.php">
		<p>Votre mise* :<br> <input id="userInput" type="number" name="mise" min="1" required></p>

	 	Misez sur un nombre entre 1 et 36 et repartez avec 35 fois votre mise :<br>
		<div>
			<input type="number" name="choixMise" value="number" min="1" max="36"><br>
		</div> 
		<p>ou</p>
		Misez sur la parité et doublez votre mise :<br>
		<input type="radio" name="choixMise" value="pair">Nombre pair <br>
		<input type="radio" name="choixMise" value="impair">Nombre impair <br><br>
		<input type="submit" name="SubmitBtn" value="C'est parti !">
		<p>Les champs indiqués par une * sont obligatoires</p>
	</form>
	<a href= index.php?deconnexion>Se déconnecter</a>
	
  </body>
</html>