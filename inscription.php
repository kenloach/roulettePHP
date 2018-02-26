<?php
# on spécifie que l'on va utiliser les sessions PHP
session_start();
#traitement PHP
$error="";

var_dump($_SESSION);

#traitement du formulaire d'inscription
if (isset($_POST['btnSubmit'])) {
	#vérifier les données
	if($_POST['username'] != "" ) {
		if($_POST['pswd'] != "") {
		#remplir la session
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['pswd'] = $_POST['pswd'];
		$_SESSION['email'] = $_POST['email'];
		#puis direction la roulette
		header("Location: index.php");
		}
		else { $error = "Mot de passe incorrect";}
	} else { $error = "Nom d'utilisateur incorrect";}
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
  <h1> Connectez-vous pour jouer à la roulette</h1>
     <?php if($error != "");
		echo '<div id=error>'.$error.'</div>' ?>
	 

	<form method="post" action="inscription.php">
		User Name *: <br>  <input id="userInput" type="text" name="username" placeholder="Username" required><br>
		Mot de passe *:<br> <input id="userInput" type="password" name="pswd" placeholder="Password" required><br>
		Confirmer le mot de passe :<br> <input id="userInput" type="password" name="conf_pswd" placeholder="Password"><br>
		Adresse mail : <br><input id="userInput" type="email" name="email" placeholder="Adresse mail"><br>
		<input type="submit" name="btnSubmit" value="Envoyer">
		<input type="reset" name="btnReset" value="Effacer">
		<p>Les champs indiqués par une * sont obligatoires</p>
	</form>
		
	<form method="post" action="index.php">
		<input type="submit" name="btnRetour" value="Retour à l'accueil">
	</form>
  </body>
</html>